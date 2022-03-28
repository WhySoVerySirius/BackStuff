<?php
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.muicss.com/mui-0.10.3/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.muicss.com/mui-0.10.3/extra/mui-colors.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.muicss.com/mui-0.10.3/js/mui.min.js"></script>
    <link rel="stylesheet" href="./styles/index.css">
    <script src="./scripts/index.js" defer></script>
</head>

<body>
    <!-- Tutorial HTML goes here -->
    <div id="sidebar" class="mui--bg-color-indigo-500">
        <div class="links selected mui--text-light mui--text-display1 mui--align-vertical" id="questionTab">QUESTIONS</div>
        <div class="links mui--text-light mui--text-display1 mui--align-vertical" id="chatTab">CHAT</div>
    </div>
    <div id="chat" class="mui-container-fluid">
        <div class="mui-row" id="mainChatBody">
            <div class="mui-col-sm-10 mui-col-sm-offset-1" id="mainChatBodyToo">
                <div id="chatBody">
                    <div class="mui-container-fluid" id="needs-overflow">
                        <div class="mui-row">
                            <div class="mui-col-md-3">
                                <div class="mui-container-fluid">
                                    <div class="mui-row">
                                        <div></div>
                                    </div>
                                    <div class="mui-row">
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mui-col-md-12" id="chat-box"></div>
                        </div>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label chat-line">
                        <input type="text" id="chatInput">
                        <button type="button" class="mui-btn mui-btn--raised mui--bg-color-indigo-500 mui--color-indigo-50" id="sendMsg">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="mui-container-fluid">
        <div class="mui-row">
            <div class="mui-col-sm-10 mui-col-sm-offset-1">
                <br>
                <br>
                <div class="mui--text-dark-secondary mui--text-body2 indigo">QUESTION FORM</div>
                <form class="mui-form">
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" id="questionTitle">
                        <label>Your question title</label>
                    </div>
                    <div class="mui-textfield mui-textfield--float-label">
                        <input type="text" id="questionBody">
                        <label>Your question body</label>
                    </div>
                    <button type="submit" class="mui-btn mui-btn--raised mui--bg-color-indigo-500 mui--color-indigo-50" id="submitForm">Submit</button>
                    <button type="button" class="mui-btn mui-btn--raised mui--bg-color-indigo-500 mui--color-indigo-50" id="login">Login</button>
                    <button type="submit" class="mui-btn mui-btn--raised mui--bg-color-indigo-500 mui--color-indigo-50" id='logout'>Logout</button>
                    <div id="authError"></div>
                </form>
                <br>
                <br>
                <div class="mui--text-dark-secondary mui--text-body2">RECENT QUESTIONS</div>
                <div class="mui-divider"></div>
                <br>
                <div id="questions"></div>
            </div>
        </div>
    </div>
</body>
<?php
/*
isset ($_SERVER['REQUEST_URI'])
    ? $URI = substr($_SERVER['REQUEST_URI'],1)
    : null;
echo $URI;
foreach($_SERVER as $key => $value){?>
<li><?php
echo $key,'  =>  ',$value;?></li><?php
}
*/

session_start();


$_SESSION['is_active'] = true;
isset($_SESSION['is_active'])
? var_dump($_SESSION)
: null;

// session_destroy();


unset($_SESSION['is_active']);


echo isset($_SESSION['is_active'])
? var_dump($_SESSION)
: PHP_EOL, "  no session  ";

setcookie('Mine','yes',time()+3600);
setcookie('Not_Mine', 'yes');
echo $_COOKIE['Mine'] 
    ? '  Cookie is set? ' . $_COOKIE['Mine']
    : '  Cookie is not set  ';

unset($_COOKIE['Mine']);

echo $_COOKIE['Mine'] 
    ? '  Cookie is set? ' . $_COOKIE['Mine']
    : '  Cookie is not set';

echo '  Cookie No.2: ' . $_COOKIE['Not_Mine'];

$array = [123, 12412, 123, 'asdasd', 'asdasd', 123213, true];
$obj = new stdClass;
$obj->name='Yeet';
$obj->surname='Yeetus';
$obj->age=15;
echo json_encode($array);
$encoded = json_encode($array);
echo $encoded;
var_dump(json_decode($encoded, true));
// echo json_encode($obj);

class Yeet {
    public $status='true';
    public function __construct(string $name, string $lastName, int $age)
    {
        $this->name=$name;
        $this->lastName=$lastName;
        $this->age=$age;  
    }
}
$obj3 = new Yeet('Yeet','Boom',50);
echo json_encode($obj3);


?>

</html>