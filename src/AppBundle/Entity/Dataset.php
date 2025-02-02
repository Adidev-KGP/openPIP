<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="`dataset`")
 */
class Dataset
{
	
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	
	/**
	 * @ORM\ManyToMany(targetEntity="Dataset_Request" , inversedBy="datasets")
	 * @ORM\JoinTable(name="dataset_request_dataset",
	 *      joinColumns={
	 *      		@ORM\JoinColumn(name="dataset_id", referencedColumnName="id")
	 *      	},
	 *      inverseJoinColumns={
	 *      		@ORM\JoinColumn(name="dataset_request_id", referencedColumnName="id")
	 *      	}
	 * 		)
	 */
	public $dataset_requests;

	/**
	 * @ORM\ManyToMany(targetEntity="Interaction" , inversedBy="datasets")
	 * @ORM\JoinTable(name="interaction_dataset",
	 *      joinColumns={
	 *      		@ORM\JoinColumn(name="dataset_id", referencedColumnName="id")
	 *      	},
	 *      inverseJoinColumns={
	 *      		@ORM\JoinColumn(name="interaction_id", referencedColumnName="id")
	 *      	}
	 * 		)
	 */
	public $interactions;

	
	/**
	 * @ORM\OneToMany(targetEntity="Data_File", mappedBy="dataset")
	 */
	
	public $data_files;
	
	/**
	 * @ORM\ManyToMany(targetEntity="User" , inversedBy="datasets")
	 * @ORM\JoinTable(name="user_datasets",
	 *      joinColumns={
	 *      		@ORM\JoinColumn(name="dataset_id", referencedColumnName="id")
	 *      	},
	 *      inverseJoinColumns={
	 *      		@ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 *      	}
	 * 		)
	 */
	public $users;
	
	
	public function __construct() {
		$this->datasets = new \Doctrine\Common\Collections\ArrayCollection();
		$this->interactions = new \Doctrine\Common\Collections\ArrayCollection();
		$this->data_files = new \Doctrine\Common\Collections\ArrayCollection();
		$this->dataset_requests = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $name;

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $pubmed_id;
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $author;
	
	/**
	 * @ORM\Column(type="string", length=10, nullable=true)
	 */
	protected $year;
	
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $interaction_status;
	
	/**
	 * @ORM\Column(type="string", length=1000, nullable=true)
	 */
	protected $description;
	

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $number_of_interactions;
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $file_path;
	


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add interactions
     *
     * @param \AppBundle\Entity\Interaction $interactions
     * @return Dataset
     */
    public function addInteraction(\AppBundle\Entity\Interaction $interactions)
    {
        $this->interactions[] = $interactions;

        return $this;
    }

    /**
     * Remove interactions
     *
     * @param \AppBundle\Entity\Interaction $interactions
     */
    public function removeInteraction(\AppBundle\Entity\Interaction $interaction)
    {
        $this->interactions->removeElement($interaction);
    }

    /**
     * Get interactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInteractions()
    {
        return $this->interactions;
    }

    /**
     * Add data_files
     *
     * @param \AppBundle\Entity\Data_File $data_files
     * @return Dataset
     */
    public function addDataFile(\AppBundle\Entity\Data_File $data_files)
    {
        $this->data_files[] = $data_files;

        return $this;
    }

    /**
     * Remove data_files
     *
     * @param \AppBundle\Entity\Data_File $data_files
     */
    public function removeDataFile(\AppBundle\Entity\Data_File $data_files)
    {
        $this->data_files->removeElement($data_files);
    }

    /**
     * Get data_files
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDataFiles()
    {
        return $this->data_files;
    }

    /**
     * Set pubmedId
     *
     * @param string $pubmedId
     *
     * @return Dataset
     */
    public function setPubmedId($pubmedId)
    {
        $this->pubmed_id = $pubmedId;

        return $this;
    }

    /**
     * Get pubmedId
     *
     * @return string
     */
    public function getPubmedId()
    {
        return $this->pubmed_id;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Dataset
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set year
     *
     * @param string $year
     *
     * @return Dataset
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Dataset
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set numberOfInteractions
     *
     * @param string $numberOfInteractions
     *
     * @return Dataset
     */
    public function setNumberOfInteractions($numberOfInteractions)
    {
        $this->number_of_interactions = $numberOfInteractions;

        return $this;
    }

    /**
     * Get numberOfInteractions
     *
     * @return string
     */
    public function getNumberOfInteractions()
    {
        return $this->number_of_interactions;
    }

    /**
     * Set interactionStatus
     *
     * @param string $interactionStatus
     *
     * @return Dataset
     */
    public function setInteractionStatus($interactionStatus)
    {
        $this->interaction_status = $interactionStatus;

        return $this;
    }

    /**
     * Get interactionStatus
     *
     * @return string
     */
    public function getInteractionStatus()
    {
        return $this->interaction_status;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Dataset
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add datasetRequest
     *
     * @param \AppBundle\Entity\Dataset_Request $datasetRequest
     *
     * @return Dataset
     */
    public function addDatasetRequest(\AppBundle\Entity\Dataset_Request $datasetRequest)
    {
        $this->dataset_requests[] = $datasetRequest;

        return $this;
    }

    /**
     * Remove datasetRequest
     *
     * @param \AppBundle\Entity\Dataset_Request $datasetRequest
     */
    public function removeDatasetRequest(\AppBundle\Entity\Dataset_Request $datasetRequest)
    {
        $this->dataset_requests->removeElement($datasetRequest);
    }

    /**
     * Get datasetRequests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDatasetRequests()
    {
        return $this->dataset_requests;
    }

    /**
     * Set filePath
     *
     * @param string $filePath
     *
     * @return Dataset
     */
    public function setFilePath($filePath)
    {
        $this->file_path = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Dataset
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
