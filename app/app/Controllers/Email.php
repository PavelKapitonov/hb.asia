<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Email extends Controller
{
    public function send()
    {
        $arr = urldecode(file_get_contents('php://input'));
        
        parse_str($arr, $data);
        
        if(isset($data['email'])){
            
            $product = $data['product'];
            $email = $data['email'];
            $phone = $data['phone'];
            $name = $data['name'];
            $emailArray = [$email, "info@healingbowl.ru", "info@healingbowl-school.ru"];

            $mailText = '
            <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                <tr>
                    <td>
                    <center style="max-width: 600px; width: 100%;">
                        <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                            <tr>
                                <td>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Новый заказ:</b> '.$product.'
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Имя:</b> '.$name.' 
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Email:</b> <a href="mailto:'.$email.'">'.$email.'</a> 
                                    </span>                                    
                                    <span style="display:inline-block; width:300px;">
                                        <b>Телефон:</b> <a href="tel:'.$phone.'">'.$phone.'</a> 
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Наш сайт:</b> <a href="https://healingbowl-school.ru/">healingbowl-school.ru</a> 
                                    </span>                                    
                                    <span style="display:inline-block; width:300px;">
                                        Наш менеджер свяжется и проконсультирует Вас в течении рабочего дня. Консультация не обязывает к покупке, мы будем рады ответить на Ваши вопросы
                                    </span>             
                                </td>
                            </tr>
                        </table>
                    </center>   
                    </td>
                </tr>
            </table>
            ';

            $email = \Config\Services::email();

            $email->setFrom('noreply@healingbowl-school.ru', 'HEALINGBOWLSCHOOL');
            $email->setTo($emailArray);
            
            $email->setSubject('New order '.$product);
            $email->setMessage($mailText);
            
            $email->send();   
            
            return '1';
            
        }
        return;
    }
    public function callback()
    {
        $arr = urldecode(file_get_contents('php://input'));
        
        parse_str($arr, $data);
        
        if(isset($data['phone'])){
            
            $link = $data['link'];
            $phone = $data['phone'];
            $name = $data['name'];
            $emailArray = ["info@healingbowl.ru", "info@healingbowl-school.ru"];

            $mailText = '
            <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                <tr>
                    <td>
                    <center style="max-width: 600px; width: 100%;">
                        <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                            <tr>
                                <td>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Ссылка:</b> '.$link.'
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Имя:</b> '.$name.'
                                    </span>                                    
                                    <span style="display:inline-block; width:300px;">
                                        <b>Телефон:</b> <a href="tel:'.$phone.'">'.$phone.'</a> 
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Наш сайт:</b> <a href="https://healingbowl-school.ru/">healingbowl-school.ru</a> 
                                    </span>                                    
                                    <span style="display:inline-block; width:300px;">
                                        Наш менеджер свяжется и проконсультирует Вас в течении рабочего дня. Консультация не обязывает к покупке, мы будем рады ответить на Ваши вопросы.
                                    </span>             
                                </td>
                            </tr>
                        </table>
                    </center>   
                    </td>
                </tr>
            </table>
            ';

            $email = \Config\Services::email();

            $email->setFrom('noreply@healingbowl-school.ru', 'HEALINGBOWLSCHOOL');
            $email->setTo($emailArray);
            
            $email->setSubject('Callback');
            $email->setMessage($mailText);
            
            $email->send();   
            
            return '1';
            
        }
        return;
    }    
}
