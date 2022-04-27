<?php

namespace App\Entity;

use App\Repository\PeliculasRepository;
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

    #[ORM\ManyToOne(targetEntity: Actor::class, inversedBy: 'peliculas')]
    private $actor;

    #[ORM\ManyToOne(targetEntity: Director::class, inversedBy: 'peliculas')]
    private $director;

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

    public function getActor(): ?Actor
    {
        return $this->actor;
    }

    public function setActor(?Actor $actor): self
    {
        $this->actor = $actor;

        return $this;
    }

    public function getDirector(): ?Director
    {
        return $this->director;
    }

    public function setDirector(?Director $director): self
    {
        $this->director = $director;

        return $this;
    }
}
