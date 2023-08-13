<?php
/**
 * #Author  @ Faisal Ahmed
 * #Date:   @ 9/21/18 12:31 AM
 * #Phone:  @ 01788656451
 * #Email:  @ contact@imfaisal.me
 * #Created On isp File @ isp_helper.php
 */

     if ( ! defined('BASEPATH')) exit('No direct script access allowed');

     if ( ! function_exists('asset_url()'))
     {
         function asset_url()
         {
             return base_url().'assets/';
         }
     }
