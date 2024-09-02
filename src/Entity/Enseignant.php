<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnseignantRepository::class)]
class Enseignant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 10)]
    private ?string $matricule_EN = null;

    /**
     * @var Collection<int, Module>
     */
    #[ORM\OneToMany(targetEntity: Module::class, mappedBy: 'enseignant')]
    private Collection $modules;

    /**
     * @var Collection<int, EmploisDuTemps>
     */
    #[ORM\OneToMany(targetEntity: EmploisDuTemps::class, mappedBy: 'enseignant')]
    private Collection $emploisDuTemps;

    /**
     * @var Collection<int, Classe>
     */
    #[ORM\OneToMany(targetEntity: Classe::class, mappedBy: 'enseignant')]
    private Collection $classes;

    /**
     * @var Collection<int, Cours>
     */
    #[ORM\OneToMany(targetEntity: Cours::class, mappedBy: 'enseignant')]
    private Collection $cours;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
        $this->emploisDuTemps = new ArrayCollection();
        $this->classes = new ArrayCollection();
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMatriculeEN(): ?string
    {
        return $this->matricule_EN;
    }

    public function setMatriculeEN(string $matricule_EN): static
    {
        $this->matricule_EN = $matricule_EN;

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): static
    {
        if (!$this->modules->contains($module)) {
            $this->modules->add($module);
            $module->setEnseignant($this);
        }

        return $this;
    }

    public function removeModule(Module $module): static
    {
        if ($this->modules->removeElement($module)) {
            // set the owning side to null (unless already changed)
            if ($module->getEnseignant() === $this) {
                $module->setEnseignant(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->nom . ' ' . $this->prenom; // Choisissez la manière dont vous souhaitez afficher l'enseignant
    }

    /**
     * @return Collection<int, EmploisDuTemps>
     */
    public function getEmplois(): Collection
    {
        return $this->emploisDuTemps;
    }

    public function addEmploi(EmploisDuTemps $emploisDuTemps): static
    {
        if (!$this->emploisDuTemps->contains($emploisDuTemps)) {
            $this->emploisDuTemps->add($emploisDuTemps);
            $emploisDuTemps->setEnseignant($this);
        }

        return $this;
    }

    public function removeEmploi(EmploisDuTemps $emploisDuTemps): static
    {
        if ($this->emploisDuTemps->removeElement($emploisDuTemps)) {
            // set the owning side to null (unless already changed)
            if ($emploisDuTemps->getEnseignant() === $this) {
                $emploisDuTemps->setEnseignant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classe $class): static
    {
        if (!$this->classes->contains($class)) {
            $this->classes->add($class);
            $class->setEnseignant($this);
        }

        return $this;
    }

    public function removeClass(Classe $class): static
    {
        if ($this->classes->removeElement($class)) {
            // set the owning side to null (unless already changed)
            if ($class->getEnseignant() === $this) {
                $class->setEnseignant(null);
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
            $cour->setEnseignant($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): static
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getEnseignant() === $this) {
                $cour->setEnseignant(null);
            }
        }

        return $this;
    }
}
