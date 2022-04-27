<?php

namespace App\Entity;

use App\Repository\ActorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActorRepository::class)]
class Actor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nombre;

    #[ORM\Column(type: 'date')]
    private $fechaNacimiento;

    #[ORM\Column(type: 'date', nullable: true)]
    private $fechaFallecimiento;

    #[ORM\Column(type: 'string', length: 25)]
    private $lugarNacimiento;

    #[ORM\OneToMany(mappedBy: 'actor', targetEntity: Peliculas::class)]
    private $peliculas;

    public function __construct()
    {
        $this->peliculas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getFechaFallecimiento(): ?\DateTimeInterface
    {
        return $this->fechaFallecimiento;
    }

    public function setFechaFallecimiento(?\DateTimeInterface $fechaFallecimiento): self
    {
        $this->fechaFallecimiento = $fechaFallecimiento;

        return $this;
    }

    public function getLugarNacimiento(): ?string
    {
        return $this->lugarNacimiento;
    }

    public function setLugarNacimiento(string $lugarNacimiento): self
    {
        $this->lugarNacimiento = $lugarNacimiento;

        return $this;
    }

    /**
     * @return Collection<int, Peliculas>
     */
    public function getPeliculas(): Collection
    {
        return $this->peliculas;
    }

    public function addPelicula(Peliculas $pelicula): self
    {
        if (!$this->peliculas->contains($pelicula)) {
            $this->peliculas[] = $pelicula;
            $pelicula->setActor($this);
        }

        return $this;
    }

    public function removePelicula(Peliculas $pelicula): self
    {
        if ($this->peliculas->removeElement($pelicula)) {
            // set the owning side to null (unless already changed)
            if ($pelicula->getActor() === $this) {
                $pelicula->setActor(null);
            }
        }

        return $this;
    }
}
