<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $nomClass = null;

    #[ORM\ManyToOne(inversedBy: 'classes')]
    private ?Enseignant $enseignant = null;

    /**
     * @var Collection<int, Etudiant>
     */
    #[ORM\OneToMany(targetEntity: Etudiant::class, mappedBy: 'classe')]
    private Collection $etudiants;

    /**
     * @var Collection<int, Cours>
     */
    #[ORM\OneToMany(targetEntity: Cours::class, mappedBy: 'classe')]
    private Collection $cours;

    /**
     * @var Collection<int, EmploisDuTemps>
     */
    #[ORM\OneToMany(targetEntity: EmploisDuTemps::class, mappedBy: 'classe')]
    private Collection $emploisDuTemps;

    public function __construct()
    {
        $this->etudiants = new ArrayCollection();
        $this->cours = new ArrayCollection();
        $this->emploisDuTemps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClass(): ?string
    {
        return $this->nomClass;
    }

    public function setNomClass(string $nomClass): static
    {
        $this->nomClass = $nomClass;

        return $this;
    }

    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?Enseignant $enseignant): static
    {
        $this->enseignant = $enseignant;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiants(): Collection
    {
        return $this->etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): static
    {
        if (!$this->etudiants->contains($etudiant)) {
            $this->etudiants->add($etudiant);
            $etudiant->setClasse($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): static
    {
        if ($this->etudiants->removeElement($etudiant)) {
            // set the owning side to null (unless already changed)
            if ($etudiant->getClasse() === $this) {
                $etudiant->setClasse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): static
    {
        if (!$this->cours->contains($cour)) {
            $this->cours->add($cour);
            $cour->setClasse($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): static
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getClasse() === $this) {
                $cour->setClasse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EmploisDuTemps>
     */
    public function getEmploisDuTemps(): Collection
    {
        return $this->emploisDuTemps;
    }

    public function addEmploi(EmploisDuTemps $emploisDuTemps): static
    {
        if (!$this->emploisDuTemps->contains($emploisDuTemps)) {
            $this->emploisDuTemps->add($emploisDuTemps);
            $emploisDuTemps->setClasse($this);
        }

        return $this;
    }

    public function removeEmploi(EmploisDuTemps $emploisDuTemps): static
    {
        if ($this->emploisDuTemps->removeElement($emploisDuTemps)) {
            // set the owning side to null (unless already changed)
            if ($emploisDuTemps->getClasse() === $this) {
                $emploisDuTemps->setClasse(null);
            }
        }

        return $this;
    }

    public function addEmploisDuTemp(EmploisDuTemps $emploisDuTemp): static
    {
        if (!$this->emploisDuTemps->contains($emploisDuTemp)) {
            $this->emploisDuTemps->add($emploisDuTemp);
            $emploisDuTemp->setClasse($this);
        }

        return $this;
    }

    public function removeEmploisDuTemp(EmploisDuTemps $emploisDuTemp): static
    {
        if ($this->emploisDuTemps->removeElement($emploisDuTemp)) {
            // set the owning side to null (unless already changed)
            if ($emploisDuTemp->getClasse() === $this) {
                $emploisDuTemp->setClasse(null);
            }
        }

        return $this;
    }
}
