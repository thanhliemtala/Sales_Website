-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 07, 2023 lúc 04:59 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

CREATE DATABASE IF NOT EXISTS `web` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `init` varchar(255) DEFAULT '0',
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `init`, `createAt`, `updateAt`) VALUES
('admin', '$2y$10$ng45/YpuZVsHo5CnlEYazOsnCSpgvkJ552vFBKSwN4yB147/FAH0u', '0', '2023-08-16 19:52:02', '2023-08-16 19:52:02'),
('liem', '$2y$10$ng45/YpuZVsHo5CnlEYazOsnCSpgvkJ552vFBKSwN4yB147/FAH0u', '0', '2023-08-16 19:52:02', '2023-08-16 19:52:02'),
('nguyen', '$2y$10$ng45/YpuZVsHo5CnlEYazOsnCSpgvkJ552vFBKSwN4yB147/FAH0u', '0', '2023-08-16 19:52:02', '2023-08-16 19:52:02'),
('thinh', '$2y$10$ng45/YpuZVsHo5CnlEYazOsnCSpgvkJ552vFBKSwN4yB147/FAH0u', '0', '2023-08-16 19:52:02', '2023-08-16 19:52:02'),
('trieu', '$2y$10$ng45/YpuZVsHo5CnlEYazOsnCSpgvkJ552vFBKSwN4yB147/FAH0u', '0', '2023-08-16 19:52:02', '2023-08-16 19:52:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `date`, `approved`, `content`, `news_id`, `user_id`, `parent`) VALUES
(1, '2023-12-07 20:09:04', 1, 'Great !!', 2, 'abc@def.com', NULL),
(2, '2023-12-07 20:09:55', 1, 'Great! Nice writting', 4, 'abc@def.com', NULL),
(3, '2023-12-07 20:11:05', 1, 'That amazing !!', 2, 'abc@def.com', NULL),
(4, '2023-12-07 20:11:19', 1, 'I do not think so', 6, 'vouu@tt.com', NULL),
(5, '2023-12-07 20:11:57', 1, 'That is entirely thinking', 7, 'vouu@tt.com', NULL),
(6, '2023-12-07 20:12:24', 1, 'Welcome very much!!', 7, 'abc@def.com', NULL),
(7, '2023-12-07 20:12:24', 1, 'Welcome very much!!', 7, 'abc@def.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `status`, `date`, `description`, `content`, `title`) VALUES
(1, 1, '2023-06-12 11:00:33', 'Disney x Vans đang tạo nên một đại náo lớn trong năm kỷ niệm 100\'s năm thành lập Disney. Không giống như những bộ phim trước đây với nhân vật \"phản diện\", lần này Disney x Vans chọn lựa những nhân vật kinh điển được người hâm mộ yêu thích.', 'Các thiết kế giày Vans dựa trên ba nhân vật nổi tiếng của Disney: Mickey, Minnie, và Tigger, được lồng ghép tinh tế vào các dòng giày như Era, Old Skool, và Sk8-Hi. Sự kết hợp giữa Disney và Vans có lịch sử dài, bắt đầu từ những năm 90 và đặc biệt hợp tác mạnh mẽ từ năm 2013. BST lần này được thúc đẩy bởi cả hai thương hiệu, đề cao sự sáng tạo để thể hiện cái tôi cá nhân của người mang.\r\nCác đôi giày sử dụng những nhân vật phản diện của Disney để tạo ra những sản phẩm đa dạng cho người lớn và trẻ em, với các thiết kế ấn tượng trên dòng giày Era, Old Skool, và Sk8-Hi. Điểm đặc biệt của BST là sự tái hiện của sáu nhân vật lớn của Disney - Mickey, Minnie, Vịt Donald, Vịt Daisy, Goofy, và Pluto trên chiếc giày \"Authentic\" \r\nvới thiết kế đặc biệt ở từng góc độ. Phiên bản trắng đen cổ điển và phiên bản màu sắc rực rỡ đều hứa hẹn mang đến cho người mặc những trải nghiệm độc đáo và gần gũi với tuổi thơ. BST không chỉ giới hạn ở những nhân vật quen thuộc mà còn mang đến sự độc đáo với việc lồng ghép Elsa, Tiana, Stitch, và Nữ hoàng xấu xa trong giày Disney 100 Scrapbook Multi. \r\nMỗi đôi giày không chỉ là sản phẩm, mà còn là biểu tượng kết nối thế hệ, nơi niềm vui và sự ngây thơ vượt qua thời gian. Như một phần của dự án lớn chào mừng 100 năm thành lập Disney, BST giới hạn với 6 mẫu sản phẩm tiêu biểu đã tạo nên một buổi tiệc giày quy mô lớn. Việc mang về những \"nhân vật yêu thích\" từ Disney thông qua BST này là như một phép thuật từ thế giới cổ tích, và không kỳ diệu nào lớn hơn nếu bạn bỏ lỡ cơ hội này.', 'DISNEY X VANS 2023 - BST Giày Siêu Sao Chính Hãng Chính Thức Đổ Bộ Việt Nam Đánh Dấu 100 Năm Thành Lập DISNEY'),
(2, 1, '2023-12-04 10:00:29', 'Kenzo và Giám đốc Nghệ thuật Nigo đã tuyên bố sự hợp tác với nghệ sĩ đồ họa tài năng Verdy, người đã nổi tiếng với vai trò giám đốc nghệ thuật cho tour diễn Born Pink và đồ họa cho show Xuân-Hè 2024.', 'Verdy, người bạn thân của Nigo, được yêu mến vì sự kết hợp độc đáo giữa hơi thở đường phố Nhật Bản và phong cách phương Tây, kết hợp hip hop và manga.\r\nSự kết hợp này mang lại không khí Đông-Tây đặc trưng của Kenzo, với bảng màu nền sáng bao gồm trắng sữa, đỏ cam, xanh hải quân và đen. Dưới sự chỉ đạo của Nigo và Verdy, màu sắc được kết hợp sáng tạo, làm mới loạt trang phục thiết yếu và tạo ra thiết kế túi tote mới với logo Kenzo Paris của Verdy.\r\nHợp tác giữa Kenzo và Verdy không chỉ là cuộc đối thoại sáng tạo giữa Nigo và Verdy, mà còn là sự kết nối giữa giá trị di sản vượt thời gian của Kenzo và cái nhìn hiện đại, táo bạo của Verdy. BST đã chính thức ra mắt trên thị trường toàn cầu và tại Việt Nam, sản phẩm Kenzo được phân phối chính hãng bởi Công ty Quốc tế Tam Sơn.', 'KENZO Hợp Tác Cùng VERDY - Giám Đốc Nghệ Thuật World Tour BLACKPINK Trong BST Mới'),
(3, 1, '2023-11-29 10:13:46', 'Nếu bạn đã bỏ lỡ cơ hội săn vé xem trực tiếp chuyến lưu diễn Renaissance thì Beyoncé đã mang siêu phẩm này lên màn ảnh. Bên cạnh những bản hit lừng danh của “Queen B”, “Renaissance Tour” còn tập trung vào trang phục sequin màu bạc và thời trang khiêu vũ lấp lánh lấy cảm hứng từ âm nhạc Disco. ', 'Cuối tuần qua ở Beverly Hills, Nhà hát Samuel Goldwyn đã tổ chức buổi ra mắt chính thức cho bộ phim đang được người hâm mộ mong đợi. Dàn sao hạng A từ Lizzo, Kris Jenner đến Winnie Harlow hay Halle Bailey cũng xuất hiện đầy lộng lẫy để chúc mừng ca sĩ Beyoncé. Beyoncé, ngôi sao của bữa tiệc, diện một chiếc váy cúp ngực màu bạc của Versace phối cùng đôi găng tay opera cùng tông. Chiếc váy lấp lánh được thiết kế tỉ mỉ để tôn lên đường cong cơ thể của nữ ca sĩ. Vẻ đẹp của Beyoncé được nhấn nhá bằng phấn mắt màu bạc và mái tóc dài đến thắt lưng. Thậm chí, NTK Donatella Versace đã đăng tải trên Instagram để dành lời khen ngợi và bày tỏ sự phấn khích đối với bộ phim: “Beyoncé, bạn là tầm nhìn của Versace. Bạn là duy nhất. Tôi đang rất nóng lòng xem Renaissance Tour: A Film”. Sự kiện của siêu sao hàng đầu không thể thiếu danh sách những khách mời hạng A với trang phục ấn tượng sẵn sàng bước lên “thảm bạc”. Kelly Rowland chọn một chiếc váy màu bạc với phần cúp ngực hình nón từ BST Jean Paul Gaultier Thu-Đông 2023 do Julien Dossena thiết kế cho khách mời. Trong khi đó, Michelle Williams mặc thiết kế của Bishme Cromartie bao gồm một chiếc áo choàng ngoại cỡ và và tà áo bằng vải tweed. Ca sĩ Janelle Monáe chọn trang phục chấm bi của Annakiki, Lori Harvey diện chiếc váy ngắn Mugler màu đen cổ điển, trong khi Chloe Bailey mặc chiếc váy LaQuan Smith màu tím nhạt, điểm thêm chút màu sắc cho bữa tiệc đậm màu matellic.', 'BEYONCÉ Diện Váy “Phủ Bạc”, Dàn Sao Hạng A Lộng Lẫy Tại Buổi Ra Mắt “RENAISSANCE TOUR: A FILM”'),
(4, 1, '2023-06-12 10:06:32', 'Love thể hiện tầm nhìn thiết kế của Cartier. Thiết kế thể hiện sự hoàn hảo của những đường nét thanh thoát và tỷ lệ chính xác: một chiếc vòng tay hình bầu dục được tạo thành từ hai vòng cung cứng được vít lại với nhau.Mọi thứ nằm ở thiết kế, đường nét cứng rắn đặc trưng của vòng tay Love, trong đó hai phần có hình elip và phần trên phẳng. Cảm giác thẳng được nhấn mạnh hơn nữa nhờ sự căn chỉnh của các vít, đi theo các đường song song của dây đeo.', 'Với vòng tay Love, Cartier đã đưa ra quyết định cấp tiến là để lộ các vít chức năng hoặc trang trí - được gắn chặt bằng tuốc nơ vít đi kèm với vòng. Đây là trực giác đầy phong cách của một người thợ kim hoàn, người nhìn thấy vẻ đẹp ở bất cứ đâu và dám thể hiện những gì mà người khác thường muốn che giấu. Trong số tất cả các thiết kế của Cartier, những chiếc đinh vít là thiết kế có độ sáng chói nhất và có thể nhận ra ngay lập tức. Chúng giống với chiếc đồng hồ Santos de Cartier, thiết kế đã có sự hiện diện của đinh vít trên viền từ năm 1904. Chúng tạo điểm nhấn cho chiếc vòng tay ngay từ cái nhìn đầu tiên và tăng sự quyến rũ song tính của nó. Hình dáng của lắc tay Love cũng phải thoải mái, hài hòa với chuyển động. Độ chính xác về tỷ lệ của nó có thể được nhìn thấy qua cách mà chiếc lắc tay này được đeo và cách nó ôm sát cổ tay một cách tự nhiên.\r\nĐược tạo ra ở New York vào năm 1969 bởi nhà thiết kế Cartier Aldo Cipullo, chiếc vòng tay Love là một biểu tượng của thiết kế trang sức. Nó đã dự đoán trước một món đồ unisex đầy tính biểu tượng - tròn 30 năm trước - là đồ trang sức của những năm 2000.\r\nVượt trên cả thiết kế, vòng tay Love là một món đồ mang tính điểm nhấn, một hiện thân vật chất của cảm xúc. Tình yêu không còn tự do nữa mà gắn kết những người yêu nhau lại thông qua một vật đính ước bằng vàng đeo trên cổ tay và được đóng lại bằng một chiếc tuốc nơ vít. Chiếc vòng tay này giống như một chiếc còng tay quý giá vì cần có hai người để cố định các con vít. Bằng cách đeo nó, mỗi cặp đôi có thể tuyên bố tình yêu của họ dành cho nhau cho mọi người. Được Cartier ra mắt vào năm 2007 như một thử thách, câu hỏi Bạn sẽ đi bao xa vì Tình yêu? tập trung vào sự kết nối cảm xúc mãnh liệt được tượng trưng một cách xuất sắc bởi chiếc vòng tay Love.\r\n', 'Vòng Tay CARTIER LOVE - Một Hiện Thân Của Cảm Xúc Mãnh Liệt'),
(5, 1, '2023-11-23 11:35:25', 'Kate Middleton đã tham dự bữa tiệc trang trọng tại Cung điện Buckingham để vinh danh Tổng thống Hàn Quốc Yoon Suk Yeol và Đệ nhất phu nhân Kim Keon Hee trong chuyến thăm Vương quốc Anh vừa rồi.Món đồ trang sức công nương xứ Wales mang trong buổi tiệc tiếp đón Tổng thống Hàn Quốc vừa qua đã thu hút mọi sự chú ý. Kate Middleton đeo chiếc vương miện Strathmore Rose Tiara mà hầu hết các thế hệ người theo dõi gia đình hoàng gia chưa từng thấy trước đây.', 'Chiếc vương miện này là món quà cưới do cha của Thái hậu Elizabeth, Lord Strathmore, trao tặng cho Thái hậu trước khi bà kết hôn với Công tước xứ York vào năm 1923. Món trang sức được thiết kế như một vòng hoa hồng dại. Chiếc vương miện kim cương ban đầu được mua từ Catchpole & Williams - thợ kim hoàn tại London. Chiếc vương miện có thể được đeo theo nhiều cách: trên trán, đặt trên tóc hoặc tháo rời để tạo thành năm chiếc trâm cài riêng lẻ.\r\nSau cái chết của mẹ vào năm 2022, Nữ hoàng Elizabeth II được truyền lại chiếc vương miện này. Tuy nhiên, nó vẫn nằm trong kho lưu trữ hoàng gia trong nhiều thập kỷ. Theo báo cáo, món trang sức này đã không được bất kỳ người phụ nữ hoàng gia nào đeo kể từ những năm 1930. Có tin đồn rằng có lẽ nó đã quá hư hỏng hoặc mỏng manh để có thể tái sử dụng. Tuy nhiên, giờ đây, chiếc vương miện kim cương quý hiếm đã được Công nương xứ Wales “tái sinh”.\r\nCùng với chiếc vương miện Strathmore Rose Tiara, Kate mặc váy trắng của Jenny Packham. Công nương cũng đeo các huân chương được hoàng gia trao tặng những năm qua như một cách thể hiện sự trang trọng nhất của các thành viên hoàng gia khi đón tiếp nguyên thủ nước ngoài. Kate hoàn thiện vẻ ngoài của mình bằng một đôi găng tay opera màu trắng.\r\nTrước đó, tại Lễ diễu hành Vệ binh ở London, Kate Middleton đã cùng Vua Charles và Vương hậu Camilla tham dự nghi lễ chào đón. Công nương xứ Wales nổi bật trong trang phục “all-red” với chiếc mũ rộng vành được đặt làm riêng của Jane Taylor và áo khoác của Catherine Walker & Co. Công nương xứ Wales đã đeo đôi bông tai hình giọt nước bằng đá sapphire và kim cương, món trang sức từng thuộc về Công nương Diana, người mẹ chồng quá cố của cô.', 'KATE MIDDLETON Và Chiếc Vương Miện “Bị Lãng Quên” Trong Bữa Tiệc Tại Cung Điện BUCKINGHAM'),
(6, 1, '2023-11-22 16:52:24', 'Sáng nay 22/11 (theo giờ Việt Nam), BLACKPINK thu hút truyền thông khi góp mặt trong buổi tiệc cấp nhà nước nhân dịp Tổng thống Hàn Quốc thăm chính thức nước Anh. Buổi quốc yến diễn ra tại Cung điện Buckingham (London) do Vua Charles III chủ trì.', 'Được biết, BLACKPINK là nhóm nhạc Hàn Quốc duy nhất nằm trong 170 khách mời tham dự bữa tiệc chiêu đãi cấp nhà nước tại Cung điện của Hoàng gia Anh. Đặc biệt, BLACKPINK còn được nhắc đến trong bài phát biểu của Vua Charles III khi ông khen ngợi họ vì đã sử dụng danh tiếng của mình để bảo vệ các mối quan tâm về môi trường.\r\n“Tôi hoan nghênh Jennie, Jisoo, Lisa và Rosé hay còn được gọi chung là BLACKPINK, những người mang trọng trách đưa thông điệp về môi trường bền vững đến khán giả toàn cầu với tư cách là Đại sứ quan hệ công chúng của Hội nghị Biến đổi Khí hậu lần thứ 26 (COP26) và gần đây họ là Đại sứ danh dự cho các Mục tiêu Phát triển Bền vững của Liên Hợp Quốc. Tôi dành sự ngưỡng mộ với cách mà họ ưu tiên những vấn đề quan trọng cấp thiết, trong khi trở thành những ngôi sao toàn cầu” - Vua Charles III phát biểu.\r\nCả bốn thành viên nhóm nhạc nữ xuất hiện trong trang phục dạ tiệc hoàng gia, thu hút nhiều lời khen từ cộng đồng mạng. Jisoo diện váy đen tay bồng từ BST Dior Cruise 2024 và giày Mlle Dior thắt nơ, kèm túi xách CD Signature chưa ra mắt. Rosé diện đầm đen ôm sát cơ thể, kết hợp với vòng tay Cluster Tennis Bracelet của Tiffany&Co. và giày Zoe Pumps In Patent Leather của Saint Laurent. Jennie chọn váy trắng trễ vai dáng dài và túi xách nơ sequin. Lisa diện chiếc đầm xanh ngọc đính sequin tỉ mỉ từ BST Xuân - Hè 2024 của Georges Hobeika, thương hiệu nổi tiếng của Li-băng. Dù có phần \"lạc quẻ\", Lisa vẫn toát lên vẻ quý phái và sang trọng.\r\nSự kiện tham dự lần này đã ghi thêm một con dấu vào bảng vàng thành tích số lần tham dự hội nghị cấp cao của 4 nàng BLACKPINK, góp phần khẳng định sức ảnh hưởng tích cực của nhóm nhạc tới các vấn đề toàn cầu.', 'BLACKPINK Đẹp Lộng Lẫy Tựa Công Chúa Tham Dự Quốc Yến Tại Cung Điện BUCKINGHAM'),
(7, 1, '2023-11-18 18:38:56', 'Tại sự kiện nâng cao nhận thức về sức khỏe tinh thần do đệ nhất phu nhân Jill Biden tổ chức, Rosé (BLACKPINK) đại diện cho hội thần tượng K-pop nói riêng và tiếng nói của người dân Hàn Quốc nói chung. Nữ ca sĩ xuất hiện đầy lịch thiệp đúng với không khí trang trọng của sự kiện với áo blazer đen, mini skirt và quần tất đen. Cô nàng không quên xách tay chiếc túi Saint Laurent Le 37 mini làm điểm nhấn cho bộ trang phục.', 'Đồng hành cùng Rosé có Đệ nhất phu nhân Hàn Quốc Kim Keon Hee. Bà vẫn giữ vững phong độ “mặc đẹp” thường thấy. Kim Keon Hee thu hút mọi ánh nhìn với chiếc áo blazer xám chiết eo, quần tây đen và khăn quàng cổ cùng tông. Để hoàn thiện trang phục, bà chọn giày cao gót đen thanh lịch và túi Bucket của Jil Sander. \r\nRosé cho biết việc có lượng lớn người theo dõi trên mạng xã hội khiến cô cảm thấy dễ bị tổn thương, đặc biệt là khi bị chỉ trích. “Tôi thực sự cảm thấy như một số việc tôi làm không bao giờ là đủ, và cho dù tôi có làm việc chăm chỉ đến đâu thì vẫn luôn có ai đó có quan điểm riêng của họ hoặc thích kiểm soát câu chuyện.” - Rosé chia sẻ. “Và vì vậy, điều đó đến với tôi như một cảm giác cô đơn. Giống như chúng ta nuôi dưỡng bản thân để có sức khỏe và thể lực tốt hơn, sức khỏe tinh thần chỉ có thể được duy trì đồng thời, nếu không muốn nói là có chủ ý hơn, như sức khỏe thể chất của chúng ta”.\r\nBuổi thảo luận là một phần của chuỗi sự kiện do Jill Biden tổ chức dành cho phu nhân của các nhà lãnh đạo châu Á-Thái Bình Dương tại California. “Những người lớn tuổi như chúng tôi chưa bao giờ nói về sức khỏe tinh thần”. - Bà Jill Biden nói. “Tôi xấu hổ vì điều đó. Nhưng những gì tôi nhận thấy với tư cách là một giáo viên và có các đứa cháu nhỏ hơn ở độ tuổi hai mươi, tôi nghĩ họ cởi mở hơn nhiều khi nói chuyện với nhau. Điều này khiến tôi bớt xấu hổ đi phần nhiều”.', 'ROSÉ (BLACKPINK) Mặc Thanh Lịch Bên Đệ Nhất Phu Nhân HÀN QUỐC Để Phát Biểu Về Sức Khỏe Tinh Thần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `iduser` varchar(255) NOT NULL,
  `num` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_note` varchar(1000) DEFAULT NULL,
  `product_subcategory` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `types` varchar(100) DEFAULT NULL,
  `style` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_price`, `product_name`, `product_note`, `product_subcategory`, `image_path`, `types`, `style`, `color`) VALUES
(1, 1329000, 'Jordan Flight MVP', '', 'Áo thun nam dài tay', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/8dd0133c-9137-4ecd-baa7-eead1b4d346b/jordan-flight-mvp-long-sleeve-t-shirt-Hd47tL.png', 'men', 'FD6943-010', 'Đen'),
(2, 2089000, 'Jordan MVP', '', 'Quần nỉ nam', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/3c33131c-5959-4113-a4df-e76513c0f73d/jordan-mvp-fleece-trousers-fNVZxk.png', 'men', 'FD7858-010', 'Đen'),
(3, 2959000, 'Nike Swoosh', NULL, 'Áo khoác dệt nam', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/5c2004c1-1879-46df-8c56-a19dde02d0f8/swoosh-woven-jacket-MkRDpr.png', 'men', 'FB7878-010', 'Đen/Trắng'),
(4, 1019000, 'Nike Sportswear', NULL, 'Áo thun nam', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/175c5458-9547-446e-ad62-25e941ce0e71/sportswear-t-shirt-DHgCC1.png', 'men', 'FV1414-386', 'Xanh lá cây'),
(5, 3829000, 'Nike Air Max 90', NULL, 'Giày nam', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/52cc3fbd-3762-48cf-8522-ed87df49fdf7/air-max-90-shoes-0MB5rJ.png', 'men', 'FB9658-001', 'Đen/Trắng'),
(6, 3829000, 'Jordan Max Aura 5', NULL, 'Giày nam', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/04e23e3d-e3ee-4830-8969-e757aef41911/jordan-max-aura-5-shoes-ZBZ4Pz.png', 'men', 'DZ4353-101', 'Trắng/Đỏ/Xám/Đen'),
(7, 4109000, 'Nike Air Max 1', NULL, 'Giày nam', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/428b09d0-e330-4503-a0f6-75c729635dcc/air-max-1-shoes-ZCSX34.png', 'men', 'FD9082-103', 'Trắng/Đen/Xanh dương'),
(8, 4699000, 'Nike Air Max Pulse Roam', NULL, 'Giày nam', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/bf1f138b-3e53-44fb-9c67-1748df1630d4/air-max-pulse-roam-shoes-NSfkP0.png', 'men', 'DZ3544-001', 'Xám'),
(9, 4029000, 'Nike Sportswear', NULL, 'Áo khoác nữ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/e45d2080-3952-4247-ab28-0472cc6148b4/sportswear-jacket-bllDGJ.png', 'women', 'DO3792-010', 'Đen'),
(10, 1739000, 'Nike Sportswear Phoenix Fleece', NULL, 'Quần thể thao ống rộng lưng cao nữ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/77221fd0-bcb1-46d9-ab30-be6ac5bd2b13/sportswear-phoenix-fleece-high-waisted-wide-leg-tracksuit-bottoms-2pmR0r.png', 'women', 'DQ5616-133', 'Trắng/Đen'),
(11, 2189000, 'Nike Sportswear Modern Fleece', NULL, 'Áo hoodie Terry kiểu Pháp nữ cỡ lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b8b74130-1863-4249-bb5b-963df259f08b/sportswear-modern-fleece-oversized-french-terry-hoodie-1DWlgN.png', 'women', 'DV7807-838', 'Trắng/Hồng'),
(12, 969000, 'Nike Sportswear', NULL, 'Áo thun nữ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c81dce61-c46f-4df1-9764-76bd32ade534/sportswear-t-shirt-kbsJJW.png', 'women', 'FD4150-010', 'Đen/Trắng'),
(13, 3239000, 'Nike Air Force 1 \'07 EasyOn', NULL, 'Giày nữ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/57558712-5ebe-4abb-9984-879f9e896b4c/air-force-1-07-easyon-shoes-lpjTWM.png', 'women', 'DX5883-100', 'Trắng'),
(14, 4109000, 'Jordan Stadium 90', NULL, 'Giày nữ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/e48b21b9-405e-4697-b9b6-b9675a40bb66/jordan-stadium-90-shoes-0cSSz3.png', 'women', 'FB2269-103', 'Xanh lá'),
(15, 3239000, 'Air Jordan 1 Low', 'Bestseller', 'Giày nữ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/703f7ab5-d757-4705-89bc-7ee06a76e1da/air-jordan-1-low-shoes-459b4T.png', 'women', 'DC0774-080', 'Bạch kim/Cam'),
(16, 2499000, 'Nike Court Legacy Lift', 'Bestseller', 'Giày nữ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/83b3f3b8-216f-4cc2-b5b2-c3d3bb93432d/court-legacy-lift-shoes-1zLxsK.png', 'women', 'DM7590-200', 'Trắng/Cam/Xám'),
(17, 689000, 'Nike Heritage', 'Sustainable Materials', 'Túi đeo chéo', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/588297c8-ef63-4320-a28f-3ca48829f357/heritage-cross-body-bag-FHCSkR.png', 'men', 'FB2861-381', 'Xanh dương'),
(18, 709000, 'Jordan Peak', 'Sustainable Materials', 'Mũ len', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/67128314-b5da-4759-8182-f1d8fe5085a3/jordan-peak-essential-beanie-wrxT3j.png', 'men', 'FN4672-340', 'Đen'),
(19, 2349000, 'Nike Hike', 'Sustainable Materials', 'Balo', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/eb1b29d9-941c-4ca5-ae32-4b12ee61d1e4/hike-backpack-J9xJd6.png', 'men', 'DJ9677-455', 'Xanh dương/Đen/Xanh lục'),
(20, 559000, 'Jordan Rise Cap', 'Sustainable Materials', 'Mũ lưỡi trai', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco,u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/22c03553-630a-4afb-b56d-5944314c27ca/jordan-rise-cap-adjustable-hat-2fsSH0.png', 'men', 'FD5186-010', 'Đen'),
(21, 2089000, 'Nike Sportswear', NULL, 'Túi lông thú giả', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c2baa15b-9ef3-4bbe-a4d2-9ea2e34e92c5/sportswear-faux-fur-tote-vTrb26.png', 'women', 'FB3050-010', 'Đen/Trắng'),
(22, 1449000, 'Nike Gym Club', 'Sustainable Materials', 'Túi tập', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/94b84465-a022-4322-a48d-8ccaa50fd0d5/gym-club-training-bag-XnJ7qN.png', 'women', 'DH6863-615', 'Hồng'),
(23, 1199000, 'Nike Sportswear Futura 365', NULL, 'Balo mini lông thú giả', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/aa82403e-5363-495a-aceb-def54a0ff37d/sportswear-futura-365-faux-fur-mini-backpack-0SxVZ7.png', 'women', 'FB3049-838', 'Hồng/Đen'),
(24, 769000, 'Nike Peak', 'Sustainable Materials', 'Mũ len', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/2a32df28-c8f2-4ec8-a40b-4d5d1dced509/peak-beanie-c5hBhl.png', 'women', 'FJ8688-838', 'Hồng'),
(25, 919000, 'Nike Sportswear', 'Sustainable Materials', 'Áo thun dài tay cho bé trai lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/60f51cad-5525-4c23-8659-32188d454bf9/sportswear-older-long-sleeve-t-shirt-JNb3Lt.png', 'kids', 'FJ2958-893', 'Cam'),
(26, 559000, 'Nike Sportswear', NULL, 'Áo thun cho bé trai lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c3626c68-b954-4039-bd82-3dd03f3cbd47/sportswear-older-t-shirt-ZXNWtZ.png', 'kids', 'FD3132-063', 'Xám'),
(27, 659000, 'Nike Jersey', NULL, 'Quần đùi cho bé trai lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c55fee66-872d-4b99-bdee-338b6979dc30/jersey-older-shorts-jr9Nxg.png', 'kids', 'DA0806-091', 'Xám/Đen'),
(28, 509000, 'Nike Dri-FIT Trophy23', 'Sustainable Materials', 'Quần đùi cho bé trai lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b50d202a-fcaa-4020-9f2f-524f1ef17e63/dri-fit-trophy23-older-shorts-SqBfzl.png', 'kids', 'FD3959-450', 'Xanh dương/Trắng'),
(29, 2809000, 'Nike Air Force 1', 'Member product', 'Giày cho bé lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/97a088bf-40c4-4cd3-9a1e-c10314be9dc1/air-force-1-older-shoes-GkM3dc.png', 'kids', 'FV3981-100', 'Trắng/Xám/Bạc'),
(30, 2419000, 'Nike Air Force 1', NULL, 'Giày cho bé lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/e86c1dae-7df9-43bf-bfa4-761a80fab5c4/air-force-1-older-shoes-w6PsF3.png', 'kids', 'CT3839-101', 'Trắng/Xanh dương/Đỏ'),
(31, 1069000, 'Nike Sportswear Club Fleece', NULL, 'Áo nỉ cổ tròn cho bé gái lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/603b1f22-2f73-4671-9481-14c56199b2b7/sportswear-club-fleece-older-crew-neck-sweatshirt-ZpKQNZ.png', 'kids', 'FJ6161-113', 'Trắng/Vàng'),
(32, 769000, 'Nike Sportswear', NULL, 'Áo thun cho bé gái lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0b8d05bb-d980-4d7a-a98e-108a2b192b7d/sportswear-older-t-shirt-hXkN63.png', 'kids', 'FV3669-100', 'Trắng'),
(33, 969000, 'Nike Sportswear Club Fleece', NULL, 'Quần ống rộng cho bé gái lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/35513e6a-8c8f-42a1-b8b4-424caff48a51/sportswear-club-fleece-older-wide-leg-trousers-dFtxrg.png', 'kids', 'FD2927-126', 'Vàng/Trắng'),
(34, 769000, 'Nike Sportswear Club Fleece', NULL, 'Quần đùi Terry kiểu Pháp cho be gái lớn', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f2e3f06c-14b8-41ba-996f-417b524642e7/sportswear-club-fleece-older-13cm-french-terry-shorts-gj1ZPd.png', 'kids', 'FD2919-615', 'Hồng/Trắng'),
(35, 1399000, 'Nike Flex Plus 2', 'Sustainable Materials', 'Giày cho trẻ tập đi', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/e8912281-5de7-4e26-ba97-1a0157275e1a/flex-plus-2-shoes-S48sDb.png', 'kids', 'DV8998-400', 'Đen/Hồng/Trắng'),
(36, 1789000, 'Nike Force 1 LE', NULL, 'Giày cho trẻ nhỏ', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/990b2e4a-5453-4961-8d5f-ee5bff3a73e8/force-1-le-younger-shoe-rg3gD7.png', 'kids', 'DH2925-111', 'Trắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`email`, `profile_photo`, `fname`, `lname`, `gender`, `age`, `phone`, `createAt`, `updateAt`, `password`) VALUES
('a@b.com', 'public/img/user/2023_12_07_12_36_22pm.', 'A', 'B', 1, 80, '0111222333', '2023-12-07 18:36:22', '2023-12-07 18:36:22', '$2y$10$mkafYTXGGiUhql82ODvM4Or2sR0pYOjZZntxYwgFhzNLBPAHU8W9O'),
('abc@def.com', '', 'ABC', 'DEF', 1, 20, '0777777777', '2023-12-07 18:37:12', '2023-12-07 18:37:12', '$2y$10$3jGkRsV5PvDFEbh1488AguInIHWg5lxp7S49LKIXYIvSxvE0zDpCu'),
('vouu@tt.com', '', 'Vô Ưu', 'Thiên Tôn', 1, 20, '0999999999', '2023-12-07 18:38:30', '2023-12-07 18:38:30', '$2y$10$3jGkRsV5PvDFEbh1488AguInIHWg5lxp7S49LKIXYIvSxvE0zDpCu');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent` (`parent`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`iduser`,`pid`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`parent`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;