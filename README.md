-----------------------------------------------
		(Vietnamese only)
-----------------------------------------------

** Lưu ý: KHÔNG GIAO HÀNG KÈM THEO FILE NÀY


################# CHANGE LOG #################
*** 2024/12/26 ***
- Khai báo file scss/mixins/_functions.scss
- Khai báo @mixin link($z-index: 2) (Dùng cho thẻ a absolute width: 100%, height: 100%)
- Khai báo @mixin forward($property, $minvalue, $maxvalue, $minvw, $maxvw, $view: vw)
	+ Sử dụng: @include forward(margin-right, 20, 50, 1440, 1920, vh); (Lưu ý không cần thêm đơn vị ở sau mỗi value, nếu không ghi thêm giá trị vh thì mặc định sẽ nhận giá trị vw).
	+ Giải thích: 	- Ở đây sẽ truyền giá trị đầu tiên là CSS properties, 20 là giá trị tối thiểu của margin-right khi viewport 1440, 50 là giá trị tối đa của margin-right khi viewport 1920, 1440 và 1920 là giá trị viewport nhỏ nhất và lớn nhất.
					- Viewport ở đây có thể là ViewWidth và ViewHeight tùy theo giá trị truyền vào.
					- Ngắn gọn thì Viewport tăng thì giá trị property sẽ tăng theo.
	+ Chức năng: Dùng để css giá trị trong khoảng mong muốn giữa 2 viewport theo tỉ lệ ViewWidth hoặc ViewHeight.

- Khai báo @mixin reverse($property, $minvalue, $maxvalue, $minvw, $maxvw, $view: vw)
	+ Sử dụng:  @include reverse(margin-right, 50, 20, 1440, 1920, vh); (Lưu ý không cần thêm đơn vị ở sau mỗi value, nếu không ghi thêm giá trị vh thì mặc định sẽ nhận giá trị vw)
	+ Giải thích: 	- Ở đây sẽ truyền giá trị đầu tiên là CSS properties, 50 là giá trị tối đa của margin-right khi viewport 1440, 20 là giá trị tối thiểu của margin-right khi viewport 1920, 1440 và 1920 là giá trị viewport nhỏ nhất và lớn nhất.
				- Viewport ở đây có thể là ViewWidth và ViewHeight tùy theo giá trị truyền vào.
				- Ngắn gọn thì Viewport tăng thì giá trị property sẽ giảm, trái ngược với forward.
	+ Chức năng: Dùng để css giá trị trong khoảng mong muốn giữa 2 viewport theo tỉ lệ ViewWidth hoặc ViewHeight.

*** 2024/03/14 ***
- Đổi cú pháp trong các file script từ $() thành jQuery() để phù hợp với phiên bản mới nhất của JQuery

*** 2024/02/24 ***
- Thêm các class thông dụng:
	ml-(x) = margin-left: (x)px
	mr-(x) = margin-right: (x)px
	mt-(x) = margin-top: (x)px
	mb-(x) = margin-bottom: (x)px
	mx-(x) = margin-left/right: (x)px
	my-(x) = margin-top/bottom: (x)px

*** 2023/06/12 ***
- Thêm @mixin col($col, $mright, $mbottom) để set width và margin cho các column.

*** 2023/04/05 ***
- Điều chỉnh nơi khai báo các class thường dùng cho page con như .image-l và .image-r vào /scss/under/
- Update câu lệnh khởi chạy SASS theo phương pháp nén CSS (sass scss:css --watch --style=compressed)

*** 2023/03/22 ***
- Khai báo @mixin select-last-row($column) (css selector cho hàng cuối cùng trong layout có nhiều hàng + cột)

*** 2023/03/15 ***
- Khai báo file scss/mixins/_functions.scss
- Khai báo @mixin aspect-ratio($width, $ratio, $scale: 1) (do thuộc tính CSS aspect-ratio vẫn còn hạn chế ở 1 số trình duyệt phiên bản cũ)

*** 2023/03/06 ***
- Thêm vào các @mixin thông dụng:
	+ size($width, $height: $width)
	+ text-verticle($direction: rl)
	+ pseudo($direction-a: top, $direction-b: left, $content: "")
	+ pseudo-center($position: "")
	+ pseudo-full($z-index: 1)
	+ arrow($color: #333, $width: 10px, $height: $width, $direction: down)
	+ border-arrow($color: #333, $width: 10, $size: 3px, $direction: right)
	+ corner-arrow($color: #333, $width: 10px, $height: $width, $direction-a: bottom, $direction-b: right)
	+ circle($size: 10px, $color: #333)
	+ text-truncate($line: 1)

*** 2023/03/03 ***
- Rút gọn phần khai báo các class .mb5 / .mt5 / .w5 / ...

*** 2023/03/01 ***
- Do phía Nhật Bản yêu cầu không đặt các tài nguyên vào folder /assets/ nên phải di chuyển về root

*** 2023/02/28 ***
- Tạo files và cấu trúc lại bộ source theo phương pháp SASS/SCSS
- Đặt ra các quy tắt khi triển khai code CSS và JS







############## HOW TO SETUP SCSS/SASS ##############

- Cài đặt Node.js (phiên bản Recommended - https://nodejs.org/en/)
- Cài đặt Git SCM (https://git-scm.com/downloads)
- Cài dặt SASS (https://sass-lang.com/install) - câu lệnh (dùng Git Bash): 
npm install -g sass
- Git Bash tại root / hoặc mở Terminal (folder gốc chứa source) và chạy câu lệnh:
sass scss:css --watch --style=compressed



################# BASIC USAGE #################

** Tạo favicon (tốt nhất nên dùng hình vuông) 
	- Truy cập page https://favicon.io/favicon-converter/ để tạo file favicon cần thiết.
	- Hãy lưu trữ các file favicon này trong folder favicon/, riêng file favicon.ico thì lưu ở root.
	(bắt buộc phải tạo khi làm code HTML dù có chỉ thị hay không)

** Khai báo các CSS cần thiết trong /scss/
(đọc thêm Tài Liệu của SASS để hiểu rõ cách sử dụng SASS/SCSS: https://sass-lang.com/documentation/)
	- 4 files mặc định (styles / responsive / under / under_responsive) đã được chia ra thành nhiều file nhỏ để tối ưu hóa việc kiểm soát:
		+ Các phần setting mặc định sẽ khai báo trong file /scss/global/_setting.scss
		+ CSS cho các thành phần có tính Tái Sử Dụng (như Button, Title, ...) sẽ khai báo trong file /scss/global/_utilities.scss
		+ CSS dùng cho phần <header> sẽ khai báo trong file /scss/global/_header.scss
		+ CSS dùng cho phần <footer> sẽ khai báo trong file /scss/global/_footer.scss
		+ CSS dùng cho phần Main Visual sẽ khai báo trong file /scss/global/_visual.scss
		+ CSS dùng cho các phần còn lại (layout của từng block/section) sẽ khai báo trong file /scss/global/_content.scss
		+ CSS chỉ dùng riêng cho màn hình PC (screen width từ 751px trở lên) sẽ khai báo trong file /scss/global/_pc_only.scss
		+ CSS dùng để responsive cho các thiết bị SP (Smart Phone - screen width từ 750px trở xuống đến 320px) sẽ khai báo trong file /scss/global/_responsive.scss
		+ CSS dùng để áp dụng riêng cho Browser được chỉ định (Firefox, Safari, ...) sẽ khai báo trong file /scss/global/_browser.scss
	
	- Tương tự với các file CSS dùng riêng cho page con (under pages)
		+ CSS cho các thẻ Heading Title từ <h2> đến <h6> (và cả các thành phần liên quan) sẽ khai báo trong file /scss/global/_utilities.scss
		+ Ngoài ra các thành phần khác tương tự nội dung đã nhắc đến phía trên.
	
** Đối với code Javascript/Jquery:
	- Các script sử dụng chung cho toàn bộ website thì khai báo ở file js/common.js
	- Các script chỉ áp dụng cho page TOP/HOME PAGE thì khai báo ở file js/top.js

	- Cố gắng tổng hợp các function được khai báo bên trong 2 events chính (clean code):
		$(document).ready(function() {});
		$(window).bind('load', function() {});
	trường hợp cần khai báo thêm thì vẫn có thể khai báo theo nhu cầu.

	- Khi muốn khởi chạy phương thức (function) của 1 thành phần (element) nhất định, phải kiểm tra Sự Tồn Tại của element đó: dùng hàm $('.element-name').length, ví dụ:
		if( $('#visual').length > 0 ) {
			$('#visual').slick({
				dots: false,
				infinite: true,
				speed: 1000,
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 5000
			});
		}
	
	- Khi tạo xong page, phải kiểm tra ở Dev Tool -> mục Console và giải quyết tất cả các Error nếu có phát sinh. Các error được xác định là do tài nguyên của bên thứ 3 (google, youtube, ...) thì bỏ qua.