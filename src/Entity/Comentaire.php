<?php

namespace App\Entity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ComentaireRepository;
use Gedmo\Mapping\Annotation\Timestampable;

/**
 * @ORM\Entity(repositoryClass=ComentaireRepository::class)
 */
class Comentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comentaire;

    /**
     * @ORM\ManyToOne(targetEntity=Travailleur::class, inversedBy="comentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $travailleur;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    private $date;



   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComentaire(): ?string
    {
        return $this->comentaire;
    }

    public function setComentaire(string $comentaire): self
    {
        $this->comentaire = $comentaire;

        return $this;
    }

    public function getTravailleur(): ?Travailleur
    {
        return $this->travailleur;
    }

    public function setTravailleur(?Travailleur $travailleur): self
    {
        $this->travailleur = $travailleur;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

 

}
