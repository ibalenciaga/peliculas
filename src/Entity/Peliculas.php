<?php

namespace App\Entity;

use App\Repository\PeliculasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeliculasRepository::class)]
class Peliculas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $titulo;

    #[ORM\Column(type: 'date')]
    private $fechaPublicacion;

    #[ORM\Column(type: 'string', length: 25)]
    private $genero;

    #[ORM\Column(type: 'integer')]
    private $duracion;

    #[ORM\Column(type: 'string', length: 50)]
    private $productora;

    #[ORM\ManyToMany(targetEntity: Actor::class, mappedBy: 'pelicula')]
    private $actor;

    #[ORM\ManyToMany(targetEntity: Director::class, mappedBy: 'pelicula')]
    private $director;

    public function __construct()
    {
        $this->actor = new ArrayCollection();
        $this->director = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getFechaPublicacion(): ?\DateTimeInterface
    {
        return $this->fechaPublicacion;
    }

    public function setFechaPublicacion(\DateTimeInterface $fechaPublicacion): self
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getDuracion(): ?int
    {
        return $this->duracion;
    }

    public function setDuracion(int $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    public function getProductora(): ?string
    {
        return $this->productora;
    }

    public function setProductora(string $productora): self
    {
        $this->productora = $productora;

        return $this;
    }

    /**
     * @return Collection<int, Actor>
     */
    public function getActor(): Collection
    {
        return $this->actor;
    }

    public function addActor(Actor $actor): self
    {
        if (!$this->actor->contains($actor)) {
            $this->actor[] = $actor;
            $actor->addPelicula($this);
        }

        return $this;
    }

    public function removeActor(Actor $actor): self
    {
        if ($this->actor->removeElement($actor)) {
            $actor->removePelicula($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Director>
     */
    public function getDirector(): Collection
    {
        return $this->director;
    }

    public function addDirector(Director $director): self
    {
        if (!$this->director->contains($director)) {
            $this->director[] = $director;
            $director->addPelicula($this);
        }

        return $this;
    }

    public function removeDirector(Director $director): self
    {
        if ($this->director->removeElement($director)) {
            $director->removePelicula($this);
        }

        return $this;
    }

    public function __toString(){
        return $this->getTitulo();
    }

}
