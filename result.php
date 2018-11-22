<html>
    <head>
        <link rel="stylesheet" type="text/css" href="font.css">
    </head>
<style>
    p{
        color:black;
        font-size:25px;
        font-style:normal;
        position: relative;
        left: 30px;
        border: 3px solid #73AD21;
        border-style:solid; 
        border-color:#FF0000; 
        padding: 1em;
        allign
    }
</style>
<?php
    $datafile = fopen("data.txt", "r") or die("server not found");
    $flag=1;
    $ret =0;
    if (file_exists($datafile))
    {
        $ret=1;
    }
    while (!eof($datafile) && $ret) 
    {
        $data = fgets($datafile);
        if (!(strcmp($data['Username'], $_POST['Username'])) && !(strcmp($data['Password'], $_POST['Passowrd'])) // change this conditon 
        {
            $result=$data['Result'];
            $flag=0;
        }
    }
    if ($flag || !$ret)
    {
        echo "Your data is missing!!";
    }
    fclose($datafile);
?>
<script>
    result=<?php echo $result;?>
    questionnum=15;
    if (result)
    {
        percentage=(result/questionnum)*100;
        document.getElementById("result").innerHTML="Score:"+result;
        document.getElementById("percentage").innerHTML="Percentage:"+percentage;
        if (percentage>80)
        {
            document.getElementById("grade").innerHTML="Grade: A";
        }
        else if (percentage>60 && percentage<80)
        {
            document.getElementById("grade").innerHTML="Grade: B";
        }
        else if (percentage>50 && percentage<60)
        {
            document.getElementById("grade").innerHTML="Grade: C";
        }
        else
        {
            document.getElementById("grade").innerHTML="Grade: D";
        }
    }
</script>
<title> results </title>
<body background="pipes.png">
    <p id="result" class="result"></p>
    <p id="percentage" class="percentage"></p>
    <p id="grade" class="grade"></p>
</body>
</html>