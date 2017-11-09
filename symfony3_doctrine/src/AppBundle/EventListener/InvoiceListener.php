<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Invoice;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs; 

class InvoiceListener {
    /**
     * On pre persist entity invoice
     * 
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        /** @var $entity Invoice */
        $entity = $args->getEntity();
        $this->setCreatedAt($entity);
    }
    
    /**
     * On pre update entity invoice
     * 
     * @param PreUpdateEventArgs $args
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        /** @var $entity Invoice */
        $entity = $args->getEntity();
        $this->setUpdatedAt($entity);
    }
    
    /**
     * Set Created At datetime
     * 
     * @param $entity Invoice
     */
    private function setCreatedAt($invoice)
    {
        if(!$invoice instanceof Invoice){
            return;
        }
        
        $invoice->setCreatedAt(new \DateTime('now'));
    }
    
    /**
     * Set Updated At datetime
     * 
     * @param $entity Invoice
     */
    private function setUpdatedAt($invoice)
    {
        if (!$invoice instanceof Invoice) {
            return;
        }
        
        $invoice->setUpdatedAt(new \DateTime('now'));
    }
}
