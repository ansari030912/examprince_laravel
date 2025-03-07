@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <sitemap>
    <loc>https://examprince.com/static/sitemap.xml</loc>
    <lastmod>2025-01-24</lastmod>
  </sitemap>

  @foreach ($vendorPages as $vendor)
    <sitemap>
      <loc>{{ $vendor['loc'] }}</loc>
      <lastmod>{{ $vendor['lastmod'] }}</lastmod>
    </sitemap>
  @endforeach

  @foreach ($examPages as $exam)
    <sitemap>
      <loc>{{ $exam['loc'] }}</loc>
      <lastmod>{{ $exam['lastmod'] }}</lastmod>
    </sitemap>
  @endforeach
  @foreach ($certificatePages as $cert)
  <sitemap>
    <loc>{{ $cert['loc'] }}</loc>
    <lastmod>{{ $cert['lastmod'] }}</lastmod>
  </sitemap>
@endforeach
@foreach ($trainingCoursePages as $trainingCourse)
<sitemap>
  <loc>{{ $trainingCourse['loc'] }}</loc>
  <lastmod>{{ $trainingCourse['lastmod'] }}</lastmod>
</sitemap>
@endforeach
  <sitemap>
    <loc>https://examprince.com/blogs-1/sitemap.xml</loc>
    <lastmod>2025-01-24</lastmod>
  </sitemap>
</sitemapindex>
