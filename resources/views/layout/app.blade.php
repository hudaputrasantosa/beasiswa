<!DOCTYPE html>
<html lang="en">
<head>
  @include('include.head')
</head>
<body>
 @include('include.topbar')

 @yield('content')

 @include('include.foot')

 @yield('js')
</body>
</html>