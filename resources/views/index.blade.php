
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, summary,
time, mark, audio, video {
    margin:0;
    padding:0;
    border:0;
    outline:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

body {
    line-height:1;
}

article,aside,details,figcaption,figure,
footer,header,hgroup,menu,nav,section {
    display:block;
}

nav ul {
    list-style:none;
}

blockquote, q {
    quotes:none;
}

blockquote:before, blockquote:after,
q:before, q:after {
    content:'';
    content:none;
}

a {
    margin:0;
    padding:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

/* change colours to suit your needs */
ins {
    background-color:#ff9;
    color:#000;
    text-decoration:none;
}

/* change colours to suit your needs */
mark {
    background-color:#ff9;
    color:#000;
    font-style:italic;
    font-weight:bold;
}

del {
    text-decoration: line-through;
}

abbr[title], dfn[title] {
    border-bottom:1px dotted;
    cursor:help;
}

table {
    border-collapse:collapse;
    border-spacing:0;
}

/* change border colour to suit your needs */
hr {
    display:block;
    height:1px;
    border:0;  
    border-top:1px solid #cccccc;
    margin:1em 0;
    padding:0;
}

input, select {
    vertical-align:middle;
}
  *{
    margin:0;
    padding:0;
  }
    .container {
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
    }
    h1{
      font-weight: bold;
      font-size: 24px;
    }
    .main {
      background-color: #fff;
      width: 50vw;
      padding: 30px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
    }
    input[type="text"]{
      width:80%;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .todo-form{
      height:37px;
      width:50vw;
      display:flex;
      justify-content:space-between;
      margin-top:20px;
    }
    input[class="add-button"]{
      border: 2px solid #dc70fa;
      font-size: 12px;
      color: #dc70fa;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }
      input[class="update-button"]{
      border: 2px solid #fc5a1e;
      font-size: 12px;
      color: #fc5a1e;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }
      input[class="delete-button"]{
      border: 2px solid #1efccc;
      font-size: 12px;
      color: #1efccc;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }
       table {
      margin:20px 20px;
      text-align: center;
      width: 48vw;
    }
    .todo-content{
      height:25px;
    }
  .add-button:hover {
      background-color: #dc70fa;
      border-color: #dc70fa;
      color: #fff;
    }
    .update-button:hover {
      background-color: #fc5a1e;
      border-color: #fc5a1e;
      color: #fff;
    }
    .delete-button:hover {
      background-color: #1efccc;
      border-color: #1efccc;
      color: #fff;
    }
        tr {
      height: 50px;
    }
  </style>
</head>
<body>
<div class="container">
<div class="main">
<h1>Todo List</h1>
<form action="/todo/create" method="POST">
    @csrf
    <div class="todo-form">
        <input type="text" name="content">
        <input class="add-button" type="submit" value="追加"/>
</form>
</div>
<table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($items as $item)
          <tr>
            <td width="30%">{{$item->created_at}}</td>
            <td width="40%">
            <input type="text" class="todo-content" value="{{$item->content}}">
            </td>
            <td>
            <form action="/todo/update" method="POST">
                <input class="update-button" type="submit" name="update" value="更新"/>
              </form>
              </td>
            <td>
                <input class="delete-button" type="submit" value="削除"/>
              </td>
          </tr>
          @endforeach
</table>
</div>
</div>
</body>
</html>