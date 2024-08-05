@if (session('msg'))
    <div class="alert alert-outline-success">{{session('msg')}}</div>
@endif 
<div class="content">
    <h2 class="mb-2 lh-sm">Hướng dẫn cài đặt Module</h2>
    <div class="card shadow-none border border-300 my-4" data-component-card="data-component-card">
        <div class="card-header p-4 border-bottom border-300 bg-soft">
          <div class="row g-3 justify-content-between align-items-center">
            <div class="col-12 col-md">
              <h4 class="text-900 mb-0" data-anchor="data-anchor" id="quick-start">Cài đặt Module trên terminal<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#quick-start" style="padding-left: 0.375em;"></a></h4>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="collapse code-collapse" id="quick-start-code"><pre class="scrollbar language-html" style="max-height:420px" tabindex="0"><code class="language-html"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mb-0<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Looking to start your project quickly? Just unzip the <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>Phoenix-v1.10.0.zip<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span>. We have precompiled and packaged everything in the <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>public<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span> directory for you. Start editing the <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span><span class="token punctuation">&gt;</span></span>public/pages/starter.html<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span> with a text or code editor, save it, and open the file in your favourite browser to see the changes.<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span></code></pre>
          </div>
          <pre class="language-html" tabindex="0"><code class="language-html">php artisan module:make ten-module</code></pre>
          <div class="p-4 code-to-copy">
            <p class="mb-0">Vào trang quản trị. Chọn menu thành viên, chọn Danh sách Module, rồi thêm mới tên module vừa tạo</p>
            <p class="mb-0">Vào trang quản trị. Chọn menu thành viên, chọn Nhóm người dùng, rồi phân quyền Module</p>
            <p class="mb-0">Vào trang quản trị. Chọn menu Quản trị Menu, chọn Thêm mới Menu</p>
            <p class="mb-0">Vào thư mục Module đã được tạo, cấu hình các thư mục sau:</p>
            <p class="mb-0">Route, Controller, Views/phoenix/part</p>
            <p class="mb-0">Lưu ý phần tạo View, Views/phoenix/part</p>
            <p class="mb-0">Nếu trong routes có tạo thêm route mới như: ten-moulde/list thì ta tạo thêm blade vào thư mục Views/phoenix/part, có tên là list-content.blade.php</p>

          </div>
        </div>
        
      </div>

      
    </div>


<script>        
    document.addEventListener('DOMContentLoaded', function(event) {
        
    });
</script>
