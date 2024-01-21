<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$product->name}}</title>
    <meta property="og:title" content="{{$product->name}}">
    <meta property="og:description" content="{{$product->short_desc}}">
    <meta property="og:image" content="{{vasset($product->image)}}">
    <meta property="og:url" content="{{route('front.share',['id'=>$product->id,'name'=>$product->name])}}">
    <meta property="og:type" content="website">
</head>
<body>
    <p>Redirecting Page.... </p>
<script>
    window.onload=()=>{
        window.location.replace("{{route('front.product',['id'=>$product->id])}}");
    };
</script>
</body>
</html>
