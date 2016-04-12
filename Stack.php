<?php
class Stack
{
    private $splstack;
    public function __construct()
    {
        $this->splstack = new \SplStack();
    }
    public function push($pushe)
    {
        $this->splstack->push($pushe);
    }

    public function pop()
    {
        try
        {
            if($this->check())
                return $this->splstack->pop();
            else
                throw new RuntimeException("You have end tag without a start tag");
        }
        catch(RuntimeException $re)
        {
            echo $re->getMessage()."<br />";
            exit;
        }
    }
    public function check()
    {
        if($this->splstack->count()==0)
            return false;
        else
            return true;
    }

    public function match_pop($tmp)
    {
        return $tmp==$this->pop();
    }

    public function make_pop()
    {
        return "</".$this->pop().">";
    }

}
?>

