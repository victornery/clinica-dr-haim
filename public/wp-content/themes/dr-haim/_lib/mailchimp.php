<?php
/*
* Mailchimp
* Desenvolvedor: João Neto/Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

if(!defined('ABSPATH')) die('!');
ob_start();

if (!class_exists('Mailchimp')) {
    require dirname(__FILE__) . '/_api/mailchimp/Mailchimp.php';
}

if (!function_exists('mailchimp_admin_notice')) {

    function mailchimp_admin_notice() {
        echo '<div class="updated">
            <p>Lead enviado para o MailChimp</p>
        </div>';
    }
}

if (!class_exists('mailchimp_form')) {

    /**
     * Description of orcamento
     *
     * @author joaoneto
     */

    class mailchimp_form {

        /**
         * @var Mailchimp
         */
        private $_mailchimp;
        public $_error = "";
        public $email;

        public function __construct() {
            $apikey  = get_theme_mod('info_mailchimp');
            $this->_mailchimp = new Mailchimp( $apikey , array('ssl_verifypeer' => false, 'ssl_verifyhost' => false));
        }

        //CLIENTE
        public function lead($email, $uf, $cidade) {

            $listaid = get_theme_mod('lista_mailchimp');

            //vars
            $this->email  = $email;
            $this->uf     = $uf;
            $this->cidade = $cidade;

            $data = array(
              'email' => $this->email,
            );

            $merge = array(
              'uf'        => $this->uf,
              'cidade'    => $this->cidade,
            );

            if ($this->uf == "UF" || $this->cidade == "") {return 4;}
            if ($email == "") {return 3;}

            try {
                $this->_mailchimp->lists->subscribe( $listaid , $data, $merge, 'html', false, true, true, false);
                //subscribe(string id, struct email, struct merge_vars, string email_type, bool double_optin, bool update_existing, bool replace_interests, bool send_welcome)
            } catch(Mailchimp_List_AlreadySubscribed $e) {
                return 2;
            } catch (Exception $e) {
                return 0;
            }
            return 1;
        }
  }
}