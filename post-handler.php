<?php
if($_SERVER['REQUEST_METHOD']==='post'){
  $name = htmlspecialchars($-post['name']);

  $feedback = htmlspecialchars($-post['feedback']);
  echo"<h1>thank you, $name! </h1>";
  echo"<P> your feedback has been received :</P>";
  echo"<blockquote> $feedback</blockquote>
}else{
echo"Invalid request";
}
?>
