<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>add tend</title>
  </head>
  <body>

    <h1>Analysis-AkioAI</h1>

    <h2>tend</h2>
    <form class="add-tend show" action="{{route('tend.store')}}" method="post">

    @csrf

        <p>:ファイル名</p>
        <select class="" name="local">
            <option value="札幌">札幌</option>
            <option value="東京">東京</option>
            <option value="中山">中山</option>
            <option value="中京">中京</option>
            <option value="阪神">阪神</option>
        </select>

        <select class="" name="ground">
            <option value="芝">芝</option>
            <option value="ダ">ダート</option>
        </select>

        <select class="" name="meter">
            <option value="1200">1200</option>
            <option value="1600">1600</option>
            <option value="2000">2000</option>
            <option value="2200">2200</option>
            <option value="2400">2400</option>
            <option value="2500">2500</option>
            <option value="2500">2500</option>
            <option value="3000">3000</option>
            <option value="3200">3200</option>
        </select>

        <button type="submit" >add</button>

    </form>

    <h2>result</h2>
    <form class="add-result show" action="{{route('result.store')}}" method="post">
        @csrf
        <p>:大会名</p>
        <input type="text" name="tournament_name" value="">

        <button type="submit" >add</button>

    </form>


  </body>
</html>
