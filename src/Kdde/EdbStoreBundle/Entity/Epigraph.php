<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinTable;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\OneToMany;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping\ManyToMany;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="Kdde\EdbStoreBundle\Entity\EpigraphRepository")
 * @ORM\Table(name="epigrafe")
 */
class Epigraph {
	
	/**
	 * @ORM\Column(type="string", length=3)
	 * @var unknown_type
	 */
	protected $edb = 'EDB';
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id_edb")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var unknown_type
	 */
	protected $id;
	
	/**
	 * @ManyToOne(targetEntity="Icvr")
     * @JoinColumn(name="id_icvr", referencedColumnName="id_edizione")
	 */
	protected $icvr;
	
	/**
	 * @ORM\Column(type="string", length=1,name="perduta")
	 * @var string
	 */
	protected $lost = 'N';
	
	/**
	 * @ORM\Column(type="string", length=5,name="alt_max_lettere")
	 */
	protected $altMaxLetters = 'n.d.';
	
	/**
	 * @ORM\Column(type="string", length=5,name="alt_min_lettere")
	 */
	protected $altMinLetters = 'n.d.';
	
	/**
	 * @var Paleography
	 * @ManyToOne(targetEntity="Paleography")
	 * @JoinColumn(name="paleografia", referencedColumnName="cod_paleografia")
	 */
	protected $paleography;
	
	/**
	 * @ORM\Column(type="string", length=1, name="reimpiego_opistografia")
	 * @var unknown_type
	 */
	protected $reimpiego_opistografia = 'N';
	
	/**
	 * @ORM\Column(type="text", name="trascrizione")
	 * @var unknown_type
	 */
	protected $trascription;
	
		
	/**
	 * @ORM\Column(type="text", name="trascrizione_nogreek")
	 * @var unknown_type
	 */
	protected $trascription_nogreek;
	
	
	/**
	 * @ORM\Column(type="text", name="trascrizione_nodiacr")
	 * @var unknown_type
	 */
	protected $trascription_nodiacr;
	
	
	/**
	 * @ORM\Column(type="text", name="trascrizione_nodiacr_nogreek")
	 * @var unknown_type
	 */
	protected $trascription_nodiacr_nogreek;
	
	
	/**
	 * @ORM\Column(type="string", length=1, name="testo_divergente")
	 * @var string
	 */
	protected $divergentText = 'N';
	
	/**
	 * @ORM\Column(type="text", name="apparato_critico")
	 * @var text
	 */
	protected $criticalApparatus;
	
	/**
	 * @ORM\Column(type="string", length=1, name="testo_metrico")
	 * @var string
	 */
	protected $metricText = 'N';
	
	/**
	 * @ORM\Column(type="string", length=1, name="greche")
	 * @var string
	 */
	protected $greek = 'N';
	
	/**
	 * @ORM\Column(type="string", length=1, name="compresenza_lg")
	 * @var string
	 */
	protected $presenceLG = 'N';
	
	/**
	 * @ManyToOne(targetEntity="Funzione")
	 * @JoinColumn(name="funzione", referencedColumnName="cod_funzione")
	 */
	protected $funzione;
	
	/**
	 * @ORM\Column(type="text", name="note_commento")
	 * @var unknown_type
	 */
	protected $comment;
	
	/**
	 * @ORM\Column(type="string", length=10, name="data_scheda")
	 * @var string
	 */
	protected $dataScheda = 'n.d.';
	
	/**
	 * @ManyToOne(targetEntity="Ambito")
	 * @JoinColumn(name="ambito_onomastico", referencedColumnName="cod_ambito")
	 */
	protected $ambitoOnomastico;
	
	
// 	"foto_PCAS" character varying(50) NOT NULL DEFAULT 'n.d.'::character varying,

	/**
	 * @ORM\Column(type="string", length=1, name="ad_annum")
	 * @var string
	 */
	protected $adAnnum = 'N';
	
	/**
	 * @ORM\Column(type="string", length=10, name="num_prog_principale")
	 * @var string
	 */
	protected $principalProgNumber = '0';
	
	
	/**
	 * @ORM\Column(type="string", length=5, name="sottoenumerazione_epigrafe")
	 * @var string
	 */
	protected $subNumeration = '0';
	
//	/**
//	 * @var Location
//	 * @ManyToOne(targetEntity="Location")
//	 * @JoinColumn(name="id_luogo", referencedColumnName="id_luogo")
//	 */
//	protected $luogo;
	
	/**
	 * @var Material
	 * @ManyToOne(targetEntity="Material", cascade={"persist", "merge","remove"})
	 * @JoinColumn(name="id_materiale", referencedColumnName="id_materiale")
	 */
	protected $material;
	
	/**
	 *
	 * @var ArrayCollection
	 * @OneToMany(targetEntity="BiblioRiferimentoEpigrafe", mappedBy="idEpigrafe")
	 */
	protected $literatures;
		
	/**
	 *
	 * @var ArrayCollection
	 * @OneToMany(targetEntity="EpigraphDating", mappedBy="id", cascade={"persist", "merge","remove"})
	 */
	protected $datings;
	
	
	// 	norm_text text,
	
	/**
	 * @ORM\Column(name="ts_testo")
	 * @var string
	 */
	protected $ts_testo;
	
	/**
	 * @ORM\Column(type="boolean", name="is_active")
	 * @var string
	 */
	protected $isActive = false;
	
	
	
	/**
	 * @ORM\Column(type="boolean", name="date_in_the_text")
	 * @var boolean
	 */
	protected $dateintext;
    

	/**
	 * @ManyToMany(targetEntity="Pertinence", inversedBy="epigraphes", cascade={"persist", "merge","remove"})
	 * @JoinTable(name="pertinenza_epigrafe",
	 *      joinColumns={@JoinColumn(name="id_epigrafe", referencedColumnName="id_edb")},
	 *      inverseJoinColumns={@JoinColumn(name="id_pertinenza", referencedColumnName="id")}
	 *      )
	 */
	protected $pertinences;
	
	
		
	
	/**
	 * 
	 * @var User
 	 * @ManyToOne(targetEntity="User")
 	 * @JoinColumn(name="id_compilatore", referencedColumnName="id")
	 */
	protected $compilator;
	
	
	
	/**
	 *
	 * @var User
	 * @ManyToOne(targetEntity="User")
	 * @JoinColumn(name="edited_by", referencedColumnName="id")
	 */
	protected $lastCompilator;
	
	
	
	
	/**
	 * @ORM\Column(type="datetimetz", name="created_at")
	 *
	 * @var DateTime $createdAt
	 */
	protected $createdAt;
	
	
	
	/**
	 * @ORM\Column(type="datetimetz", name="edited_at")
	 *
	 * @var DateTime $editedAt
	 */
	protected $editedAt;
	
	
	/**
	 * @ManyToMany(targetEntity="Conservation", inversedBy="epigraphes", cascade={"persist", "merge","remove"}))
	 * @JoinTable(name="conservazione_epigrafe",
	 *      joinColumns={@JoinColumn(name="id_epigrafe", referencedColumnName="id_edb")},
	 *      inverseJoinColumns={@JoinColumn(name="id_conservazione", referencedColumnName="id")}
	 *      )
	 * @var Array Conservation
	 */
	protected $conservations;
	
	
		
	
	/**
	 * @ManyToMany(targetEntity="Signa", inversedBy="epigraphes", cascade={"persist", "merge","remove"})
	 * @JoinTable(name="signa_epigrafe",
	 *      joinColumns={@JoinColumn(name="epigrafe_id", referencedColumnName="id_edb")},
	 *      inverseJoinColumns={@JoinColumn(name="signa_code", referencedColumnName="cod_signa")}
	 *      )
	 * @var Array Signa
	 */
	protected $signas;
	
	
	/**
	 * @ORM\Column(type="string", length=100,name="compilatore_scheda")
	 * @var string
	 */
	protected $oldCompilator;
	
	
	/**
	 * @ORM\Column(type="geopoint", name="posizione_geografica")
	 * @var string
	 */
	protected $geoPosition;
	
	
	/**
	 * @ORM\Column(type="integer", name="stato")
	 * @var integer
	 */
	protected $status = 0;

	
	/**
	 * @ORM\Column(type="integer", name="tipo")
	 * @var integer
	 */
	
	/**
	 * @ManyToOne(targetEntity="Type")
	 * @JoinColumn(name="tipo", referencedColumnName="cod_tipo")
	 */
	protected $epigraph_type;
	
	
	public function __construct(){
		$this->literatures = new ArrayCollection();
		$this->conservations = new ArrayCollection();
		$this->pertinences = new ArrayCollection();
		$this->datings = new ArrayCollection();
		$this->signas = new ArrayCollection();
		$this->createdAt = new \DateTime("now");
		$this->editedAt = new \DateTime("now");
	}

	
	/**
	 * Set type
	 *
	 * @param string $epigraph_type
	 */
	public function setEpigraphType($epigraph_type)
	{
		$this->epigraph_type = $epigraph_type;
	}
	
	/**
	 * Get type
	 *
	 * @return integer
	 */
	public function getEpigraphType()
	{
		return $this->epigraph_type;
	}
	
	/**
     * Set edb
     *
     * @param string $edb
     */
    public function setEdb($edb)
    {
        $this->edb = $edb;
    }

    /**
     * Get edb
     *
     * @return string 
     */
    public function getEdb()
    {
        return $this->edb;
    }
    
    
    /**
     * Set status
     *
     * @param integer $status
     */
    public function setStatus($status)
    {
    	$this->status = $status;
    }
    
    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
    	return $this->status;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lost
     *
     * @param string $lost
     */
    public function setLost($lost)
    {
        $this->lost = $lost;
    }

    /**
     * Get lost
     *
     * @return string 
     */
    public function getLost()
    {
        return $this->lost;
    }

    /**
     * Set altMaxLetters
     *
     * @param string $altMaxLetters
     */
    public function setAltMaxLetters($altMaxLetters)
    {
        $this->altMaxLetters = $altMaxLetters;
    }

    /**
     * Get altMaxLetters
     *
     * @return string 
     */
    public function getAltMaxLetters()
    {
        return $this->altMaxLetters;
    }

    /**
     * Set altMinLetters
     *
     * @param string $altMinLetters
     */
    public function setAltMinLetters($altMinLetters)
    {
        $this->altMinLetters = $altMinLetters;
    }

    /**
     * Get altMinLetters
     *
     * @return string 
     */
    public function getAltMinLetters()
    {
        return $this->altMinLetters;
    }

    /**
     * Set reimpiego_opistografia
     *
     * @param string $reimpiegoOpistografia
     */
    public function setReimpiegoOpistografia($reimpiegoOpistografia)
    {
        $this->reimpiego_opistografia = $reimpiegoOpistografia;
    }

    /**
     * Get reimpiego_opistografia
     *
     * @return string 
     */
    public function getReimpiegoOpistografia()
    {
        return $this->reimpiego_opistografia;
    }

    /**
     * Set trascription
     *
     * @param text $trascription
     */
    public function setTrascription($trascription)
    {
        $this->trascription = $trascription;
    }

    /**
     * Get trascription
     *
     * @return text 
     */
    public function getTrascription()
    {
        return $this->trascription;
    }

    /**
     * Set divergentText
     *
     * @param string $divergentText
     */
    public function setDivergentText($divergentText)
    {
        $this->divergentText = $divergentText;
    }

    /**
     * Get divergentText
     *
     * @return string 
     */
    public function getDivergentText()
    {
        return $this->divergentText;
    }

    /**
     * Set criticalApparatus
     *
     * @param text $criticalApparatus
     */
    public function setCriticalApparatus($criticalApparatus)
    {
        $this->criticalApparatus = $criticalApparatus;
    }

    /**
     * Get criticalApparatus
     *
     * @return text 
     */
    public function getCriticalApparatus()
    {
        return $this->criticalApparatus;
    }

    /**
     * Set metricText
     *
     * @param string $metricText
     */
    public function setMetricText($metricText)
    {
        $this->metricText = $metricText;
    }

    /**
     * Get metricText
     *
     * @return string 
     */
    public function getMetricText()
    {
        return $this->metricText;
    }

    /**
     * Set greek
     *
     * @param string $greek
     */
    public function setGreek($greek)
    {
        $this->greek = $greek;
    }

    /**
     * Get greek
     *
     * @return string 
     */
    public function getGreek()
    {
        return $this->greek;
    }

    /**
     * Set presenceLG
     *
     * @param string $presenceLG
     */
    public function setPresenceLG($presenceLG)
    {
        $this->presenceLG = $presenceLG;
    }

    /**
     * Get presenceLG
     *
     * @return string 
     */
    public function getPresenceLG()
    {
        return $this->presenceLG;
    }

    /**
     * Set comment
     *
     * @param text $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return text 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set dataScheda
     *
     * @param string $dataScheda
     */
    public function setDataScheda($dataScheda)
    {
        $this->dataScheda = $dataScheda;
    }

    /**
     * Get dataScheda
     *
     * @return string 
     */
    public function getDataScheda()
    {
        return $this->dataScheda;
    }

    /**
     * Set adAnnum
     *
     * @param string $adAnnum
     */
    public function setAdAnnum($adAnnum)
    {
        $this->adAnnum = $adAnnum;
    }

    /**
     * Get adAnnum
     *
     * @return string 
     */
    public function getAdAnnum()
    {
        return $this->adAnnum;
    }

    /**
     * Set numProgPrincipale
     *
     * @param string $numProgPrincipale
     */
    public function setPrincipalProgNumber($principalProgNumber)
    {
        $this->principalProgNumber = $principalProgNumber;
    }

    /**
     * Get principalProgNumber
     *
     * @return string 
     */
    public function getPrincipalProgNumber()
    {
        return $this->principalProgNumber;
    }

    /**
     * Set subNumeration
     *
     * @param string $subNumeration
     */
    public function setSubNumeration($subNumeration)
    {
        $this->subNumeration = $subNumeration;
    }

    /**
     * Get subNumeration
     *
     * @return string 
     */
    public function getSubNumeration()
    {
        return $this->subNumeration;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set compilator
     *
     * @param Kdde\EdbStoreBundle\Entity\User $compilator
     */
    public function setCompilator(\Kdde\EdbStoreBundle\Entity\User $compilator)
    {
        $this->compilator = $compilator;
    }

    /**
     * Get compilator
     *
     * @return Kdde\EdbStoreBundle\Entity\User
     */
    public function getCompilator()
    {
    	return $this->compilator;
    }
    
    
    /**
     * Get last compilator
     *
     * @return Kdde\EdbStoreBundle\Entity\User 
     */
    public function getLastCompilator()
    {
        return $this->lastCompilator;
    }
    
    /**
     * Set last compilator
     *
     * @param Kdde\EdbStoreBundle\Entity\User $compilator
     */
    public function setLastCompilator(\Kdde\EdbStoreBundle\Entity\User $lastCompilator)
    {
    	$this->lastCompilator = $lastCompilator;
    }
        
    

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    
    
    /**
     * Set editedAt
     *
     * @param datetime $editedAt
     */
    public function setEditedAt($editedAt)
    {
    	$this->editedAt = $editedAt;
    }
    
    /**
     * Get editedAt
     *
     * @return datetime
     */
    public function getEditedAt()
    {
    	return $this->editedAt;
    }
    
    
    

    /**
     * Set icvr
     *
     * @param Kdde\EdbStoreBundle\Entity\Icvr $icvr
     */
    public function setIcvr(\Kdde\EdbStoreBundle\Entity\Icvr $icvr)
    {
        $this->icvr = $icvr;
    }

    /**
     * Get icvr
     *
     * @return Kdde\EdbStoreBundle\Entity\Icvr 
     */
    public function getIcvr()
    {
        return $this->icvr;
    }

    /**
     * Set paleography
     *
     * @param Kdde\EdbStoreBundle\Entity\Paleography $paleography
     */
    public function setPaleography(\Kdde\EdbStoreBundle\Entity\Paleography $paleography)
    {
        $this->paleography = $paleography;
    }

    /**
     * Get paleography
     *
     * @return Kdde\EdbStoreBundle\Entity\Paleography 
     */
    public function getPaleography()
    {
        return $this->paleography;
    }

    /**
     * Set funzione
     *
     * @param Kdde\EdbStoreBundle\Entity\Funzione $funzione
     */
    public function setFunzione(\Kdde\EdbStoreBundle\Entity\Funzione $funzione)
    {
        $this->funzione = $funzione;
    }

    /**
     * Get funzione
     *
     * @return Kdde\EdbStoreBundle\Entity\Funzione 
     */
    public function getFunzione()
    {
        return $this->funzione;
    }

    
    /**
     * Set date in the text
     *
     * @param boolean
     */
    public function setDateintext($dateintext)
    {
    	$this->dateintext = $dateintext;
    }
    
    /**
     * Get dateintext
     *
     * @return boolean
     */
    public function getDateintext()
    {
    	return $this->dateintext;
    }
    
    
    /**
     * Set ambitoOnomastico
     *
     * @param Kdde\EdbStoreBundle\Entity\Ambito $ambitoOnomastico
     */
    public function setAmbitoOnomastico(\Kdde\EdbStoreBundle\Entity\Ambito $ambitoOnomastico)
    {
        $this->ambitoOnomastico = $ambitoOnomastico;
    }
    
    /**
     * Remove ambitoOnomastico
     *
     */
    public function removeAmbitoOnomastico()
    {
    	$this->ambitoOnomastico = null;
    }

    /**
     * Get ambitoOnomastico
     *
     * @return Kdde\EdbStoreBundle\Entity\Ambito 
     */
    public function getAmbitoOnomastico()
    {
        return $this->ambitoOnomastico;
    }


    /**
     * Set material
     *
     * @param Kdde\EdbStoreBundle\Entity\Material $material
     */
    public function setMaterial(\Kdde\EdbStoreBundle\Entity\Material $material)
    {
        $this->material = $material;
    }

    /**
     * Get material
     *
     * @return Kdde\EdbStoreBundle\Entity\Material 
     */
    public function getMaterial()
    {
        return $this->material;
    }
    
    
   
    public function emptyLiteratures()
    {
    	$this->literatures = new ArrayCollection();
    }

    /**
     * Add literatures
     *
     * @param Kdde\EdbStoreBundle\Entity\BiblioRiferimentoEpigrafe $literatures
     */
    public function addEpigraphLiterature(\Kdde\EdbStoreBundle\Entity\BiblioRiferimentoEpigrafe $literatures)
    {
        $this->literatures[] = $literatures;
    }

    /**
     * Get literatures
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLiteratures()
    {
        return $this->literatures;
    }

    /**
     * Set data
     *
     * @param Kdde\EdbStoreBundle\Entity\Dating $dating
     */
    public function addDating(\Kdde\EdbStoreBundle\Entity\EpigraphDating $dating)
    {
        $this->datings[] = $dating;
    }

    /**
     * Get data
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDatings()
    {
        return $this->datings;
    }


    public function emtpyDatings()
    {
    	$this->datings = new ArrayCollection();
    }
    
    
    /**
     * Set pertinence
     *
     * @param Kdde\EdbStoreBundle\Entity\Pertinence $pertinence
     */
    public function addPertinence(\Kdde\EdbStoreBundle\Entity\Pertinence $pertinence)
    {
    	$this->pertinences[] = $pertinence;
    }

//     public function removePertinence(\Kdde\EdbStoreBundle\Entity\Pertinence $pertinence)
//     {
//     	$this->pertinences->
//     }
    
    /**
     * Get pertinence
     *
     * @return Kdde\EdbStoreBundle\Entity\Pertinence 
     */
    public function getPertinence()
    {
        return $this->pertinences;
    }

    
    public function emptyPertinences()
    {
    	$this->pertinences = new ArrayCollection();
    }
    
    
    /**
     * Add conservations
     *
     * @param Kdde\EdbStoreBundle\Entity\Conservation $conservations
     */
    public function addConservation(\Kdde\EdbStoreBundle\Entity\Conservation $conservations)
    {
        $this->conservations[] = $conservations;
    }

    /**
     * Get conservations
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getConservations()
    {
        return $this->conservations;
    }
    
    
    public function emptyConservations()
    {
    	$this->conservations = new ArrayCollection();
    }

    /**
     * Add signas
     *
     * @param Kdde\EdbStoreBundle\Entity\Signa $signas
     */
    public function addSigna(\Kdde\EdbStoreBundle\Entity\Signa $signas)
    {
        $this->signas[] = $signas;
    }

    /**
     * Get signas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSignas()
    {
        return $this->signas;
    } 

    public function emptySignas()
    {
    	$this->signas = new ArrayCollection();
    }
    
    
    /**
     * Get oldCompilator
     *
     * @return string
     */
    public function getOldCompilator()
    {
    	return $this->oldCompilator;
    }
    
    /**
     * Set oldCompilator
     *
     * @param string $oldCompilator
     */
    public function setOldCompilator($oldCompilator)
    {
    	$this->oldCompilator = $oldCompilator;
    }

    /**
     * Set geoPosition
     *
     * @param string $dataScheda
     */
    public function setGeoPosition($geoPosition)
    {
        $this->geoPosition = $geoPosition;
    }

    /**
     * Get geoPosition
     *
     * @return string 
     */
    public function getGeoPosition()
    {
        return $this->geoPosition;
    }
    
    /**
     * Set TSVector rapresentation of the epigraph
     *
     * @param string $dataScheda
     */
    public function setTs_testo($ts_testo)
    {
    	$this->ts_testo = $ts_testo;
    }
    
    /**
     * Get TSVector rapresentation of the epigraph
     *
     * @return string
     */
    public function getTs_testo()
    {
    	return $this->ts_testo;
    }

}