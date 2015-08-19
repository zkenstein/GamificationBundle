<?php

/**
 * Description of EventServiceTest
 *
 * @author Lukasz
 */

namespace TMSolution\GamificationBundle\Tests;

use TMSolution\GamificationBundle\Entity\Objectinstance;
use TMSolution\GamificationBundle\Entity\Trophycategory;
use TMSolution\GamificationBundle\Entity\Trophy;
use TMSolution\GamificationBundle\Entity\Objecttrophy;
use TMSolution\GamificationBundle\Entity\Context;

class EventServiceTest extends \PHPUnit_Framework_TestCase {

    protected static $kernel;
    protected static $container;
    protected $objectinstanceModel;
    protected $trophyModel;
    protected $objectTrophyModel;
    protected $eventsService;
    protected $modelFactory;

    public static function setUpBeforeClass() {
        self::$kernel = new \AppKernel('test', true);
        self::$kernel->boot();
        self::$container = self::$kernel->getContainer();
    }

    public function setUp() {

        $this->modelFactory = $this->get('model_factory');
        $this->objectinstanceModel = $this->modelFactory->getModel('TMSolution\GamificationBundle\Entity\Objectinstance');
        $this->trophyModel = $this->modelFactory->getModel('TMSolution\GamificationBundle\Entity\Trophy');
        $this->objectTrophyModel = $this->modelFactory->getModel('TMSolution\GamificationBundle\Entity\Objecttrophy');
        $this->objectEventModel = $this->modelFactory->getModel('TMSolution\GamificationBundle\Entity\Event');
        $this->eventsService = $this->get('gamification.events');
    }

    public function get($serviceId) {
        return self::$kernel->getContainer()->get($serviceId);
    }

    public function testGetObjectTrophiesMock() {

        $mockobjecttrophy = $this->getMockBuilder('TMSolution\GamificationBundle\Entity\Objectinstance')
                ->getMock();
        $mockobjecttrophy->method('setObjectidentity')
                ->willReturn(1);
        $this->assertEquals(1, $mockobjecttrophy->setObjectidentity(1));
    }

    public function testSetObjecttypeMock() {

        $mockobjectinstance = $this->getMockBuilder('TMSolution\GamificationBundle\Entity\Objectinstance')
                ->getMock();
        $mockobjecttype = $this->getMockBuilder('TMSolution\GamificationBundle\Entity\Objecttype')
                ->getMock();
        $mockobjectinstance->method('setObjecttype')
                ->willReturn($mockobjecttype);

        $this->assertEquals($mockobjecttype, $mockobjectinstance->setObjecttype($mockobjecttype));
    }

    public function testaddObjectTrophyMock() {

        $mockobjecttrophy = $this->getMockBuilder('TMSolution\GamificationBundle\Entity\Objecttrophy')
                ->getMock();
        $mockobjecttrophy->method('setObject')
                ->willReturn(1);

        $mockobjecttrophy->method('setTrophy')
                ->willReturn(1);


        $this->assertEquals(1, $mockobjecttrophy->setObject());
        $this->assertEquals(1, $mockobjecttrophy->setTrophy());
    }

    //add object trophy - change 
    public function testAddObjectTrophy() {

        $objectinstance = $this->objectinstanceModel->findOneById(1);
        $trophy = $this->trophyModel->findOneById(1);

        $objectTrophy = $this->eventsService->addObjectTrophy($objectinstance, $trophy);

        $query = $this->objectTrophyModel->getManager()->createQuery('SELECT MAX(u.id) id FROM TMSolution\GamificationBundle\Entity\Objecttrophy u');
        $max = $query->getSingleResult();

        $foundObjectTrophy = $this->objectTrophyModel->findOneById($max["id"]);
        $this->assertEquals($objectTrophy, $foundObjectTrophy);
    }

    public function testGetObjectTrophies() {
        $objecttrophy = $this->objectTrophyModel->findAll();
        $this->assertNotNull($objecttrophy);
    }
    
    
    public function testRegister(){
        
        
    }
    
    //---------------------tests method from Model/Objectinstance------------------------------
    public function testCheckInstance(){
        
        $objectInstance = 
        
    }

}
