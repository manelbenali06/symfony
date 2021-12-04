<?php

namespace App\Controller;

use App\Entity\Maison;
use App\Form\MaisonType;
use App\Repository\MaisonRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MaisonController extends AbstractController
{
    #[Route('/maisons', name: 'maisons')]
    public function showAll(MaisonRepository $maisonRepository): Response
    {
        $houses = $maisonRepository->findAll();
        return $this->render('maison/maisons.html.twig', [
            'maisons' => $houses,
        ]);
    }

    #[route('admin/maison/create', name: 'admin_maison_create')]//a mettre dans l'url admin/maison/create
    public function create(Request $request, ManagerRegistry $managerRegistry)
    {
        $house = new Maison();//creation d'une nouvelle maison vide
        $form = $this->createForm(MaisonType::class, $house);//creation du formulaire avec en parametre la nouvelle maison
        $form->handleRequest($request);//gestionnaire de requetes HTTP

        if($form->isSubmitted() && $form->isValid()) {

            $infoImg1 = $form['img1']->getData();// reccupere les infos de l'image
            $extensionImg1 = $infoImg1->guessExtension();//reccupere l'extension de fichier de l'img1
            $nomImg1 = time() . '-1.' . $extensionImg1;//reconstitu un nom d'image unique pour l'img1
            $infoImg1->move($this->getParameter('house_pictures_directory'), $nomImg1);//voir config_packaging_serviceyaml//je la deplace dans le dossier qui convient bien
            $house->setImg1($nomImg1);


            $infoImg2 = $form['img2']->getData();

            if($form->isSubmitted() && $form->isValid()) {

                $infoImg2 = $form['img2']->getData();// reccupere les infos de l'image
                $extensionImg2 = $infoImg2->guessExtension();//reccupere l'extension de fichier de l'img1
                $nomImg2 = time() . '-2.' . $extensionImg2;//reconstitu un nom d'image unique pour l'img1
                $infoImg2->move($this->getParameter('house_pictures_directory'), $nomImg2);//voir config_packaging_serviceyaml//je la deplace dans le dossier qui convient bien
                $house->setImg2($nomImg2);
    
                $manager = $managerRegistry->getManager(); //reccupere le manager de doctrine
                $manager->persist($house);// dit a doctrine quon va vouloir sauvegarder en bdd
                $manager->flush();//execute la requete
                return $this->redirectToRoute('admin_maisons');
    
            }

            $manager = $managerRegistry->getManager(); //reccupere le manager de doctrine
            $manager->persist($house);// dit a doctrine quon va vouloir sauvegarder en bdd
            $manager->flush();//execute la requete
            return $this->redirectToRoute('admin_maisons');

        }

        return $this->render('admin/maisonForm.html.twig', [
            'formulaire' => $form->createView()//création de la vu du formulaire et envoi à la vu (fichier)
        ]);
    }

    #[Route('/maison-{id}', name: 'maison')]
    public function show(MaisonRepository $maisonRepository, int $id)
    {
        $house = $maisonRepository->find($id);
        return $this->render('maison/maison.html.twig', [
            'maison' => $house
        ]);
    }

    #[Route('/admin/maisons', name: 'admin_maisons')]
    public function showAllAdmin(MaisonRepository $maisonRepository)
    {
        $houses = $maisonRepository->findAll();
        return $this->render('admin/maisons.html.twig', [
            'maisons' => $houses
        ]);
    }

    #[Route('admin/maison/delete/{id}', name: 'admin_maison_delete')]
    public function delete(MaisonRepository $maisonRepository, int $id, ManagerRegistry $managerRegistry)
    {
        $house = $maisonRepository->find($id);
        throw new \Exception('TODO: gérer la suppression des images du dossier img');
        $manager = $managerRegistry->getManager();
        $manager->remove($house);
        $manager->flush();
        return $this->redirectToRoute('admin_maisons');
    }
}