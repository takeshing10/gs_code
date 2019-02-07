<?php
// 入力フォームの値を取得する
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$isbn = $_POST['isbn'];

// 入力フォームの中身が空かどうか判断して、googleBooksAPIに渡すパラメータを作成する
if($title){
    $titleParameter = 'intitle:"'.$title.'"+';
}else{
    $titleParameter = '';
}
if($author){
    $authorParameter = 'inauthor:"'.$author.'"+';
}else{
    $authorParameter = '';
}
if($publisher){
    $publisherParameter = 'inpublisher:"'.$publisher.'"+';
}else{
    $publisherParameter = '';
}
if($isbn){
    $isbnParameter = 'isbn:'.$isbn.'+';
}else{
    $isbnParameter = '';
}

// APIを実行するURLを生成
$data = 'https://www.googleapis.com/books/v1/volumes?q='.$titleParameter.$authorParameter.$publisherParameter.$isbnParameter.'&startIndex=0&maxResults=40&Country=JP'; //&orderBy=newest

// APIからの戻り値を読み込む
$json = file_get_contents($data);

// 文字列をjson形式に変換する
$json_decode = json_decode($json);

// jsonデータ内のキーを取得する
$totalItems = $json_decode->totalItems;
$pageChangeNum = floor($totalItems/40);

// if($totalItems>39){$totalItems=40;}
$items = $json_decode->items;

if($totalItems>40){
    $viewEndNo = 40;
}else{
    $viewEndNo = $totalItems;
}
for($i=0;$i<$viewEndNo;$i++){
    $booksId[$i] = $items[$i]->id;
    $title[$i] = $items[$i]->volumeInfo->title;
    // var_dump($title[$i]);
    $authors[$i] = $items[$i]->volumeInfo->authors;
    if(array_key_exists('publishedDate',$items[$i]->volumeInfo)){
        $publishedDate[$i] = $items[$i]->volumeInfo->publishedDate;
    }else{
        $publishedDate[$i] = 'なし';
    }
    if(array_key_exists('description',$items[$i]->volumeInfo)){
        $description[$i] = $items[$i]->volumeInfo->description;
    }else{
        $description[$i] = 'なし';
    }
    if(array_key_exists('imageLinks',$items[$i]->volumeInfo)){
        $imageLinks[$i] = $items[$i]->volumeInfo->imageLinks->thumbnail;
    }else{
        $imageLinks[$i] = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK_gbVrQ_tesypYBm_FlGt_NTN6nauEnpw0UkeBe7UwbeKEOsx';
    }
}

$tableTags = '';
if(isset($_SESSION["chk_ssid"])){
    $link="review.php";
}else{
    $link="login.php?p=nologin";
}
for($i=0;$i<$viewEndNo;$i++){
    $no = $i+1;
    $tableTags .= '<tr>
                    <td>'.$no.'</td>
                    <td><img src="'.$imageLinks[$i].'" width="100"></td>
                    <td>'.$title[$i].'</td>
                    <td>'.$authors[$i][0].'</td>
                    <td>'.$publishedDate[$i].'</td>
                    <td>
                        <form method="POST" action="'.$link.'">
                            <input type="hidden" name="booksId" value="'.$booksId[$i].'">
                            <input type="hidden" name="title" value="'.$title[$i].'">
                            <input type="hidden" name="author" value="'.$authors[$i][0].'">
                            <input type="hidden" name="publishedDate" value="'.$publishedDate[$i].'">
                            <input type="hidden" name="description" value="'.$description[$i].'">
                            <input type="hidden" name="imageLinks" value="'.$imageLinks[$i].'">
                            <input id="reviewBtn" type="submit" value="レビューを書く">
                        </form>
                    </td>
                </tr>';
}

$pageChangeNumTags='';
for($i=0;$i<$pageChangeNum;$i++){
    $no = $i+1;
    $pageChangeNumTags .= '<a href="#">'.$no.'</a> ＞ ';
}
    
echo $pageChangeNumTags;

?>
