<?php
    $str="<bmhjj> <b></b>";
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
    echo htmlspecialchars($str);
    $stack = new SplStack();

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
            $k = explode(" ", $tmp);
            $tmp=$k[0];
            echo "TMP: ".$tmp."<br />";
            if (!$b)
            {
                $stack->push($tmp);
                echo "ADDED::".$tmp."<br />";
            }
            else
            {
                if($stack->count()!=0)
                    $ret=$stack->pop();
                else
                {
                    echo "This is not done<br />";
                    break;
                }
                if($ret==$tmp)
                {
                    echo "DONE!!!!".$tmp."<br />";
                }
                else
                {
                    echo "NOT SAME!!";
                }
            }
        }
    }
    echo "Left elements::<br />";
    while($stack->count()!=0)
    {
        $ret=$stack->pop();
        echo $ret."<br />";
        $a="</".$ret.">";
        $str.=$a;
    }
    echo "<br /><br />This is final:::<br /><br />";
    echo htmlspecialchars($str);

?>