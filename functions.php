<?php

class PostContents{
	public $title;
	public $timestamp;
	public $tags;//(array)
	public $content;
	public function toString(){
		$datetime=date("M. j, Y",$this->timestamp);
		
		$tagstr="";
		//Why is tags just TRUE?
		foreach($this->tags as $tag)
			$tagstr.="<a class='tag' href='tags.php?t=".$tag."'>".$tag."</a>";//SANITIZE OMG
		$contentstr=nl2br($this->content);
		
		return <<<HEREDOC
<article class="post">
	<header>
		<span class='date'>{$datetime}</span>
		<span class='tags'>{$tagstr}</span>
		<h2>{$this->title}</h2>
	</header>
	<p>
		{$contentstr}
	</p>
</article>
HEREDOC;
	}
}

class BlogManager{
	public $posts;
	public function __construct(){//Loads all posts. Hopefully this will never be very intense.
		$this->posts=array();
		$i = 0;
		foreach(glob("posts/*.post") as $file){
			$data = explode("\n",file_get_contents($file));
			$this->posts[$i] = new PostContents;
			
			$this->posts[$i]->title = trim(array_shift($data));
			$this->posts[$i]->timestamp = (int)trim(array_shift($data));
			$this->posts[$i]->tags = explode(" ",array_shift($data));array_walk($this->posts[$i]->tags,"trim");
			$this->posts[$i]->content = trim(implode("\n",$data));
			
			$i++;
		}
		if(count($this->posts)==0)trigger_error("No blog posts found.",E_USER_ERROR);
	}
	public function filterReverseChron($start,$n){//Filters to the last $n posts, going backwards from offset $start.
		//Theoretically this is the right direction.
		uasort($this->posts, function($a,$b){return $a->timestamp > $b->timestamp ? -1 : 1;});
		$this->posts = array_slice($this->posts,$start,$n);
	}
	public function filterByTags($requiredTags){//Filters to the ones with the tags specified.
		//Tags specified need to be exactly correct - no extra spaces, capitals, hidden chars.
		$requiredTags = array_walk($requiredTags,"trim");
		$this->posts = array_filter($this->posts, function($a){
			return !array_diff($requiredTags,$a->tags);//I think this is right?
		});
	}
	public function filterByString($requiredStr){
		$requiredStr = trim($requiredStr);
		$this->posts = array_filter($this->posts, function($a){
			return strpos($a->title."\n".$a->tags."\n".$a->content,$requiredStr)!==false;
		});
	}
	public function toString(){
		$str = "";
		foreach($this->posts as $post)
			$str.=$post->toString();
		return $str;
	}
}

?>