<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    if(!function_exists('role_list'))
    {
        function role_list() {
            $status = array(
                    "admin" => "Admin",
                    "dealer" => "Dealer",
                    "customer" => "Customer"
                );

            return $status;
        }
    }

    if(!function_exists('colors_list'))
    {
        function colors_list() {
            $status = array(
                "#ffffff" => "White",
                "#00a4ff" => "Blue",
                "#f10a0a" => "Red",
                "#aab5bb" => "Grey",
                "#000000" => "Black",
                "#682c18" => "Brown"
            );

            return $status;
        }
    }
    if(!function_exists('category_list'))
    {
        function category_list() {
            $status = array(
                    1 => "Popular",
                    2 => "Offers",
                    3 => "Brand New",
                    4 => "Electric",
                    5 => "A",
                    6 => "B",
                    7 => "C"
                );

            return $status;
        }
    }
    if(!function_exists('duration_list'))
    {
        function duration_list() {
            $status = array(
                    3 => "3 Month",
                    6 => "6 Months",
                    12 => "12 Months",
                    24 => "24 Months",
                    48 => "48 Months"
                );

            return $status;
        }
    }
    if(!function_exists('package_status'))
    {
        function package_status() {
            $status = array(
                    "false" => "Select",
                    "true" => "Best Server"
                );

            return $status;
        }
    }
    if(!function_exists('booking_approvelist'))
    {
        function booking_approvelist() {
            $status = array(
                    "1" => "Pending",
                    "2" => "Pending Approval",
                    "3" => "Approve",
                    "4" => "Reject"
                );

            return $status;
        }
    }
    if(!function_exists('message'))
    {
        function message() {
            $html = "";
            if(isset($_SESSION['success'])) {
                $html = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  '.$_SESSION['success'].'
                </div>';
            } else if(isset($_SESSION['error'])) {
                $html = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  '.$_SESSION['error'].'
                </div>';
            }
        
            unset($_SESSION['success']);
            unset($_SESSION['error']);
        
            echo $html;
        }
    }

?>