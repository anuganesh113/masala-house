@include("site.includes.header")

<x-site.nav-bar />

<div style="min-height: 80vh;">
   @yield("content")
</div>

<x-site.footer />

@include("site.includes.footer")
