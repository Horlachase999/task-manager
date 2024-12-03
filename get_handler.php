<?php
if (isset($_GET['keyword'])){
  $keyword= htmlspecialchars($_GET['keyword']);
  echo "<h1>search result for: 'keyword'</h1>";
  echo "<ul>
  <li>product 1 related to '$keyword'</li>
  <li>product 2 related to '$keyword'</li>
  <li>product 3 related to'$keyword'</li>
  </ul>";
}else {
  echo "no search keyword provided";
}
?>