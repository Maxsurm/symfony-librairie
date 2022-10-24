<?php

namespace App\Entity;

use App\Repository\TypeOfBookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeOfBookRepository::class)]
class TypeOfBook
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typeName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $typeDes = null;

    #[ORM\OneToMany(mappedBy: 'typeOfBook', targetEntity: Book::class, orphanRemoval: true)]
    private Collection $books;

// ====================================================== //
// ===================== CONSTUCTEUR ==================== //
// ====================================================== //

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

// ====================================================== //
// =================== MAGIC FUNCTION =================== //
// ====================================================== //

    public function __toString()
    {
        return $this->typeName;
    }

// ====================================================== //
// =================== GETTERS/SETTERS ================== //
// ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }

    public function setTypeName(string $typeName): self
    {
        $this->typeName = $typeName;

        return $this;
    }

    public function getTypeDes(): ?string
    {
        return $this->typeDes;
    }

    public function setTypeDes(?string $typeDes): self
    {
        $this->typeDes = $typeDes;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->setTypeOfBook($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getTypeOfBook() === $this) {
                $book->setTypeOfBook(null);
            }
        }

        return $this;
    }
}
