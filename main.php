<?php

    include 'Stack.php';

    $str="<bmhjj><b></b>";

    $b=false;
    $n=strlen($str);

    for($i=$n-1;$i>=0;$i--)
    {
        if($str[$i]=='>')
            $b=true;
        else if($str[$i]=='<')
        {
            if(!($b==true && $str[$i+1]=='/'))
                $str=substr($str,0,$i);
            break;
        }
    }
    $n=strlen($str);
    $stackobj = new Stack();

    for($i=0;$i<$n;$i++)
    {
        if($str[$i]=='<')
        {
            $b = false;
            if ($str[$i+1] == '/')
            {
                $b = true;
                $i++;
            }

            $tmp = null;

            while ($str[$i + 1] != '>')
            {
                $tmp.=$str[$i+1];
                $i++;
            }

            $tmp = explode(" ", $tmp)[0];
            if (!$b)
                $stackobj->push($tmp);
            else
                if(!$stackobj->match_pop($tmp))
                {
                    echo "There is some bad code!! fix it first<br />";
                    exit;
                }

        }
    }
    while($stackobj->check())
    {
        $str.=$stackobj->make_pop();
    }
    echo htmlspecialchars($str);

?>
