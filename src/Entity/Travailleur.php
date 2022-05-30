<?php

namespace App\Entity;

use App\Repository\TravailleurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass=TravailleurRepository::class)
 * @Vich\Uploadable
 */
class Travailleur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $telph;

    /**
     * @ORM\ManyToOne(targetEntity=Metier::class, inversedBy="travailleurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $metier;

 /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\OneToMany(targetEntity=Demande::class, mappedBy="travailleur")
     */
    private $demandes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $formation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $experiance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $condi;

    /**
     * @ORM\OneToMany(targetEntity=Comentaire::class, mappedBy="travailleur")
     */
    private $comentaires;

    public function __construct()
    {
        $this->demandes = new ArrayCollection();
        $this->comentaires = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelph(): ?int
    {
        return $this->telph;
    }

    public function setTelph(int $telph): self
    {
        $this->telph = $telph;

        return $this;
    }

    public function getMetier(): ?Metier
    {
        return $this->metier;
    }

    public function setMetier(?Metier $metier): self
    {
        $this->metier = $metier;

        return $this;
    }


    public function __toString() {
        return $this->nom;
    }

   

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

  

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return Collection<int, Demande>
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Demande $demande): self
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes[] = $demande;
            $demande->setTravailleur($this);
        }

        return $this;
    }

    public function removeDemande(Demande $demande): self
    {
        if ($this->demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getTravailleur() === $this) {
                $demande->setTravailleur(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(string $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getExperiance(): ?string
    {
        return $this->experiance;
    }

    public function setExperiance(string $experiance): self
    {
        $this->experiance = $experiance;

        return $this;
    }

    public function getCondi(): ?string
    {
        return $this->condi;
    }

    public function setCondi(string $condi): self
    {
        $this->condi = $condi;

        return $this;
    }

    /**
     * @return Collection<int, Comentaire>
     */
    public function getComentaires(): Collection
    {
        return $this->comentaires;
    }

    public function addComentaire(Comentaire $comentaire): self
    {
        if (!$this->comentaires->contains($comentaire)) {
            $this->comentaires[] = $comentaire;
            $comentaire->setTravailleur($this);
        }

        return $this;
    }

    public function removeComentaire(Comentaire $comentaire): self
    {
        if ($this->comentaires->removeElement($comentaire)) {
            // set the owning side to null (unless already changed)
            if ($comentaire->getTravailleur() === $this) {
                $comentaire->setTravailleur(null);
            }
        }

        return $this;
    }

   


  

  


    
}

