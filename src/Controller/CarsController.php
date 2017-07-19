<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * PHP version 7
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @category  Cars
 * @package   Cars
 * @author    Mohammed Sufyan Shaikh <mohammed.sufyan@actonate.com>
 * @copyright 2014-2016 Copyright (c) LetsShave Pvt. Ltd.
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   SVN: $Id$
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 */
namespace App\Controller;


use App\Controller\AppController;
use Cake\Event\Event;
use Pusher;
/**
 * Cars Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @category Cars
 * @package  Cars
 * @author   Mohammed Sufyan Shaikh <mohammed.sufyan@actonate.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://www.letsshave.com/
 */
class CarsController extends AppController
{
    /**
     *   Initialization
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
    }

    /**
    * Index Method
    *
    * Used for Home Page View.
    *
    * @return void
    */
   public function index()
   {
       // API Key: Google Maps -> AIzaSyDpUbAd2JvguzuzhNxeRlNvc2mEaeklTQg
       //
       $this->viewBuilder()->layout("base_layout");
   }


   /**
   *    Trigger Pusher Event
   *
   *
   */
   public function push()
   {
       $options = array(
          'cluster' => 'ap2',
          'encrypted' => true,
          'scheme' => 'http'
        );
        $pusher = new Pusher\Pusher(
          'cdce5e2fc7aacb7ec5b0',
          '3c9e22d33851a6ec12c3',
          '370058',
          $options
        );
        $data = [];
        $data['message'] = 'Hello World!!!';
        $data['status'] = "Active";
        $dt = $pusher->trigger('cars', 'location', $data);

        $res = new ResponseObject();
        $res -> status = 'success' ;
        $res -> pusher = $dt;
        $res -> message = 'Message pushed.' ;
        $this -> response -> body(json_encode($res));
        return $this -> response ;
   }

}

?>
