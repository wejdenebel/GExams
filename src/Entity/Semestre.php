<?php

namespace App\Entity;

use App\Repository\SemestreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SemestreRepository::class)]
class Semestre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Module>
     */
    #[ORM\OneToMany(targetEntity: Module::class, mappedBy: 'semestre')]
    private Collection $modules;

    /**
     * @var Collection<int, Matiere>
     */
    #[ORM\OneToMany(targetEntity: Matiere::class, mappedBy: 'semestre')]
    private Collection $matieres;

    /**
     * @var Collection<int, EmploisDuTemps>
     */
    #[ORM\OneToMany(targetEntity: EmploisDuTemps::class, mappedBy: 'semestre')]
    private Collection $emploisDuTemps;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
        $this->matieres = new ArrayCollection();
        $this->emploisDuTemps = new ArrayCollection();
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
            $module->setSemestre($this);
        }

        return $this;
    }

    public function removeModule(Module $module): static
    {
        if ($this->modules->removeElement($module)) {
            // set the owning side to null (unless already changed)
            if ($module->getSemestre() === $this) {
                $module->setSemestre(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->nom; // Affiche le nom du semestre
    }

    /**
     * @return Collection<int, Matiere>
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matiere $matiere): static
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres->add($matiere);
            $matiere->setSemestre($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): static
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getSemestre() === $this) {
                $matiere->setSemestre(null);
            }
        }

        return $this;
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
            $emploisDuTemps->setSemestre($this);
        }

        return $this;
    }

    public function removeEmploi(EmploisDuTemps $emploisDuTemps): static
    {
        if ($this->emploisDuTemps->removeElement($emploisDuTemps)) {
            // set the owning side to null (unless already changed)
            if ($emploisDuTemps->getSemestre() === $this) {
                $emploisDuTemps->setSemestre(null);
            }
        }

        return $this;
    }
}
