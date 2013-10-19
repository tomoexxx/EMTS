<?PHP
/*
    Contact Form from HTML Form Guide

    This program is free software published under the
    terms of the GNU Lesser General Public License.

This program is distributed in the hope that it will
be useful - WITHOUT ANY WARRANTY; without even the
implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.

@copyright html-form-guide.com 2010
*/
class FGSimpleCaptcha extends FG_CaptchaHandler
{
    var $error_str;
    var $captcha_varname;
    var $uniquekey;

    function FGSimpleCaptcha($captcha_var_name)
    {
        $this->captcha_varname=$captcha_var_name;
        $this->uniquekey='KHJhsjsy65HGbsmnd';
    }

    /*Add more simple questions here.*/
    function GetSimpleCaptcha()
    {
        $arrQuestions = array(
        "空は何色ですか？"=>"あお",
//        "What is 1+1=" => "2",
        "草は何色ですか？"=>"みどり",
        "あなたはロボットですか？（はい／いいえ）"=>"いいえ",
        "あなたは人間ですか？（はい／いいえ）"=>"はい");

        $question = array_rand($arrQuestions);
        $answer = $arrQuestions[$question];

        $_SESSION['FGCF_Captcha_Answer'] = $this->Md5CaptchaAnswer($answer);

        return $question;
    }

    function SetFormKey($key)
    {
        $this->uniquekey = $key;
    }
    function GetKey()
    {
        return $this->uniquekey;
    }
    function Validate()
    {
        $ret=false;
        if(empty($_POST[$this->captcha_varname]))
        {
            //$this->error_str = "Please answer the anti-spam question";
            $this->error_str = elgg_echo('contact:error:no_antispam');
            $ret = false;
        }
        else
        {

            $scaptcha = trim($_POST[$this->captcha_varname]);

            $scaptcha = strtolower($scaptcha);

            $user_answer = $this->Md5CaptchaAnswer($scaptcha);

            if($user_answer != $_SESSION['FGCF_Captcha_Answer'])
            {
                //$this->error_str = "Failed the anti-spam check!";
                $this->error_str = elgg_echo('contact:error:failed_spam');
                $ret = false;
            }
            else
            {
                $ret = true;
            }
        }//else
        return $ret;
    }
    function Md5CaptchaAnswer($answer)
    {
        return md5($this->GetKey().$answer);
    }
    function GetError()
    {
        return $this->error_str;
    }
}
?>
