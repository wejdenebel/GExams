<?php

namespace App\Entity;

use App\Repository\AnneeAcademiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnneeAcademiqueRepository::class)]
class AnneeAcademique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    private ?string $annee = null;

    /**
     * @var Collection<int, Semestre>
     */
    #[ORM\OneToMany(targetEntity: Semestre::class, mappedBy: 'anneeAcademique')]
    private Collection $semestres;

    public function __construct()
    {
        $this->semestres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * @return Collection<int, Semestre>
     */
    public function getSemestres(): Collection
    {
        return $this->semestres;
    }

    public function addSemestre(Semestre $semestre): static
    {
        if (!$this->semestres->contains($semestre)) {
            $this->semestres->add($semestre);
            $semestre->setAnneeAcademique($this);
        }

        return $this;
    }

    public function removeSemestre(Semestre $semestre): static
    {
        if ($this->semestres->removeElement($semestre)) {
            // set the owning side to null (unless already changed)
            if ($semestre->getAnneeAcademique() === $this) {
                $semestre->setAnneeAcademique(null);
            }
        }

        return $this;
    }
}
