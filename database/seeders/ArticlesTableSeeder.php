<?php
/**
 * 文章数据填充
 * User: Woozee
 * Date: 2020/11/29
 * Time: 13:54
 */

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleKeyword;
use App\Models\ArticleLabel;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        $article = Article::create([
            'title' => 'Ubuntu18.04更换国内源',
            'content' => '<p>打开/etc/apt/sources.list</p>
<pre class="language-markup"><code>vi /etc/apt/sources.list</code></pre>
<p>将原有的数据注释掉，换上国内镜像</p>
<p>阿里云源</p>
<pre class="language-markup"><code>deb http://mirrors.aliyun.com/ubuntu/ bionic main restricted universe multiverse
deb http://mirrors.aliyun.com/ubuntu/ bionic-security main restricted universe multiverse
deb http://mirrors.aliyun.com/ubuntu/ bionic-updates main restricted universe multiverse
deb http://mirrors.aliyun.com/ubuntu/ bionic-proposed main restricted universe multiverse
deb http://mirrors.aliyun.com/ubuntu/ bionic-backports main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic-security main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic-updates main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic-proposed main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic-backports main restricted universe multiverse</code></pre>
<p>清华源</p>
<pre class="language-markup"><code>deb https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic main restricted universe multiverse
deb https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-updates main restricted universe multiverse
deb https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-backports main restricted universe multiverse
deb https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-security main restricted universe multiverse
deb https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-proposed main restricted universe multiverse
deb-src https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic main restricted universe multiverse
deb-src https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-updates main restricted universe multiverse
deb-src https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-backports main restricted universe multiverse
deb-src https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-security main restricted universe multiverse
deb-src https://mirrors.tuna.tsinghua.edu.cn/ubuntu/ bionic-proposed main restricted universe multiverse</code></pre>
<p>中科大源</p>
<pre class="language-markup"><code>deb https://mirrors.ustc.edu.cn/ubuntu/ bionic main restricted universe multiverse
deb https://mirrors.ustc.edu.cn/ubuntu/ bionic-updates main restricted universe multiverse
deb https://mirrors.ustc.edu.cn/ubuntu/ bionic-backports main restricted universe multiverse
deb https://mirrors.ustc.edu.cn/ubuntu/ bionic-security main restricted universe multiverse
deb https://mirrors.ustc.edu.cn/ubuntu/ bionic-proposed main restricted universe multiverse
deb-src https://mirrors.ustc.edu.cn/ubuntu/ bionic main restricted universe multiverse
deb-src https://mirrors.ustc.edu.cn/ubuntu/ bionic-updates main restricted universe multiverse
deb-src https://mirrors.ustc.edu.cn/ubuntu/ bionic-backports main restricted universe multiverse
deb-src https://mirrors.ustc.edu.cn/ubuntu/ bionic-security main restricted universe multiverse
deb-src https://mirrors.ustc.edu.cn/ubuntu/ bionic-proposed main restricted universe multiverse</code></pre>
<p>更改完成之后执行以下命令</p>
<pre class="language-markup"><code>apt update
apt upgrade</code></pre>',
            'summary' => 'Ubuntu18.04如何将apt的源更换为国内源，打开/etc/apt/sources.list，将源更新为阿里云源、清华源、中科大源，更新完文件之后，执行apt update和apt upgrade',
            'category_id' => 4,
        ]);
        ArticleLabel::create([
            'article_id' => $article->id,
            'label_id' => 4,
        ]);
        ArticleKeyword::insert([
            ['article_id' => $article->id, 'keyword' => 'ubuntu'],
            ['article_id' => $article->id, 'keyword' => '国内源'],
        ]);

        $article = Article::create([
            'title' => '解决点击Docker出现windows 正在查找bash.exe。如果想亲自查找文件，请点击“浏览”的问题',
            'content' => '<p>window7下安装DockerToolbox时，安装成功后，双击桌面的Docker Quickstart Terminal快捷方式，会出现以下弹框：</p>
<p><img src="../../storage/images/article/5dc13a14935c3.png" alt="" /></p>
<p>&nbsp;</p>
<p>&nbsp;可以猜测到时快捷方式所指定的路径不对（因为本人在安装Docker前已经安装好git了，原因就出在这）。</p>
<h3>解决方法</h3>
<p>邮件点击这个图标，点击属性，出现下面的图：</p>
<p><img src="../../storage/images/article/5dc13a14e0862.png" alt="" /></p>
<p>&nbsp;</p>
<p>&nbsp;在&nbsp;目标&nbsp;这一个选项处需要填写正确的 Git bash.exe文件位置来启动docker star.sh文件。我的git安装在D:\Git下，Docker Toolbox安装在C盘。所以我这里写的是：</p>
<div class="cnblogs_Highlighter sh-gutter">
<div id="highlighter_506906" class="syntaxhighlighter  bash">
<pre class="language-markup"><code>"D:\Git\bin\bash.exe" --login -i "D:\Docker Toolbox\start.sh"</code></pre>
</div>
</div>
<p>　　大家可以根据自己的安装配置来调整这块的执行语句。</p>
<p>修改完毕点击引用、确定，再双击图标即可。</p>',
            'summary' => 'window7下安装DockerToolbox时，安装成功后，双击桌面的Docker Quickstart Terminal快捷方式，会出现以下弹框：Windows 正在查找bash.exe。如果想亲自查找文件，请单击“浏览”。',
            'category_id' => 4,
        ]);
        ArticleLabel::create([
            'article_id' => $article->id,
            'label_id' => 4,
        ]);
        ArticleKeyword::insert([
            ['article_id' => $article->id, 'keyword' => 'docker'],
            ['article_id' => $article->id, 'keyword' => 'windows'],
            ['article_id' => $article->id, 'keyword' => 'bash.exe'],
        ]);

        $article = Article::create([
            'title' => 'mysql服务设置远程连接 解决1251 client does not support ..问题',
            'content' => '<div id="cnblogs_post_body" class="blogpost-body ">
<p>在navicat中连接虚拟机中的MySQL数据库时出现以下报错：</p>
<p><img src="../../storage/images/article/5dc13b19061f6.png" alt="" /></p>
<p>1、查看用户信息</p>
<div class="cnblogs_Highlighter sh-gutter">
<div id="highlighter_912122" class="syntaxhighlighter  sql">
<pre class="language-markup"><code>select Host,User,plugin,authentication_string from mysql.user ;</code></pre>
</div>
</div>
<p><img src="../../storage/images/article/5dc13b194eed9.png" alt="" /></p>
<p>&nbsp;</p>
<p>&nbsp;备注：host为%表示不限制ip,localhost表示本机使用,plugin非mysql_native_password则需要修改密码</p>
<p>2、修改用户密码</p>
<div class="cnblogs_Highlighter sh-gutter">
<div id="highlighter_638417" class="syntaxhighlighter  sql">
<pre class="language-markup"><code>ALTER USER \'root\'@\'%\' IDENTIFIED WITH mysql_native_password BY \'newpassword\';&lt;br&gt;FLUSH PRIVILEGES;</code></pre>
</div>
</div>
<p>注：这里可能会碰到以下报错：</p>
<div class="cnblogs_Highlighter sh-gutter">
<div id="highlighter_979812" class="syntaxhighlighter  bash">
<pre class="language-markup"><code>ALTER USER \'root\'@\'%\' IDENTIFIED WITH mysql_native_password BY \'newpassword\';&lt;br&gt;FLUSH PRIVILEGES;</code></pre>
</div>
</div>
<p>解决办法：</p>
<p>查看mysql初始的密码策略：</p>
<div class="cnblogs_Highlighter sh-gutter">
<div id="highlighter_769786" class="syntaxhighlighter  bash">
<pre class="language-markup"><code>SHOW VARIABLES LIKE \'validate_password%\';</code></pre>
</div>
</div>
<p><img src="../../storage/images/article/5dc13b19954a2.png" alt="" /></p>
<p>&nbsp;</p>
<p>&nbsp;需要设置密码的验证强度等级，设置 validate_password_policy 的全局参数为 LOW 即可</p>
<div class="cnblogs_Highlighter sh-gutter">
<div id="highlighter_832307" class="syntaxhighlighter  bash">
<pre class="language-markup"><code>SET GLOBAL validate_password_policy = LOW;</code></pre>
</div>
</div>
<p><img src="../../storage/images/article/5dc13b19e1fc5.png" alt="" /></p>
<p>&nbsp;</p>
</div>',
            'summary' => '在navicat中连接虚拟机中的MySQL数据库时出现以下报错：1251 - Client does not support authentication protocol requested by server;consider upgrading MySQL client',
            'category_id' => 3,
        ]);
        ArticleLabel::insert([
            ['article_id' => $article->id, 'label_id' => 2],
            ['article_id' => $article->id, 'label_id' => 4],
        ]);
        ArticleKeyword::insert([
            ['article_id' => $article->id, 'keyword' => 'mysql'],
            ['article_id' => $article->id, 'keyword' => '远程连接'],
            ['article_id' => $article->id, 'keyword' => '1251'],
        ]);

        $article = Article::create([
            'title' => '风生水起的传奇故事',
            'content' => '<p>&nbsp; &nbsp; 风生水起真名叫罗斌，75年生，今年40岁，现资金量近2亿，低调务实。</p>
<h4>&nbsp; &nbsp; 风生水起的投资要点：</h4>
<ul>
<li>选股首选市值，50亿元以下最佳，200亿元以上成长性衰退就考虑退出。只参与企业由小变大这一过程的投资，当一个企业变的足够大以后，不管它是否还有后劲，他都会选择退出寻找新的品种。</li>
<li>动态pe低于30倍。增长速度越快，股价对应的PE也应该越高。对于一家经营业绩会逐年下滑的企业来说，他认为存在着较大的投资风险，即便是PE不到20倍，他可能也不会去投资。</li>
<li>对投资者来说，是在30元时以80倍的市盈率买入该股合算，还是在80元时以30倍的市盈率买入更合算呢？</li>
<li>选择综合毛利高于30%的企业</li>
<li>考察管理层的薪酬和股权</li>
<li>所选公司是大行业的小公司，但是在行业内的排名又是数一数二的。</li>
<li>小盘次新股是内地股市牛股的摇篮，次新股往往股本规模都不大，随着企业的不断高速发展和股本的持续扩张，公司的市值也会逐年提升，几年之后长期持有的投资者可能也就实现了tenbagger的收益。</li>
<li>尽量不选择与百姓生活过于贴近的产品制造商（？）</li>
<li>回避行业景气度过高的股票。</li>
<li>投资成长股，最大的风险其实不是高市盈率，而是增速低于预期，尤其是当公司的净利润持续走下坡时，这个时候风险最大。</li>
</ul>
<p>&nbsp; &nbsp; 昨天（2015年6月14日）是风生水起的40周岁生日，有幸在雪球拜读了他的最新一篇周记。在文中他透露，2004年的时候，他仅仅怀揣16万元，却有着依靠股市投资成为千万富翁的梦想。而实际上2004年他的第一年的价值投资不太成功，以亏损收场。如果从2005年算起，风生水起10年从16万元到身价上亿，大概有几百倍的收益。</p>
<p>&nbsp; &nbsp; 那么为什么他能在10%的人获利的市场取得如此大的成功？从昨天看完他的周记起我就一直在思考这个问题。经过总结，我认为最重要的是他做到了以下几点：</p>
<p style="padding-left: 40px;">1、选股首选市值。风生水起坚持投资迷你的小市值股票。</p>
<p>最近两年我关注过的几只他投资过的股票在他建仓的时候市值如下：</p>
<ul>
<li>2013年 &nbsp;博彦科技 &nbsp;33亿</li>
<li>2013年 &nbsp;奥拓电子 15亿</li>
<li>2014年 &nbsp;友邦吊顶 &nbsp;20亿</li>
<li>2014年 &nbsp;川大智胜 &nbsp;29亿</li>
<li>2015年 &nbsp;宜昌交运 &nbsp;27亿</li>
</ul>
<p style="padding-left: 40px;">2、坚持建仓的时候必须是一般来说动态pe绝对的低估值，动态pe都30倍左右或者低于30倍。</p>
<ul>
<li>2013年 &nbsp;博彦科技 &nbsp;33亿 &nbsp; &nbsp;当年利润1.28亿 &nbsp;建仓时的估值pe &nbsp;25.8倍</li>
<li>2013年 &nbsp;奥拓电子 &nbsp;15亿 &nbsp; &nbsp;当年利润 0.47亿 &nbsp;建仓时候的动态估值 &nbsp;31.9倍 实际上2013年利润同比下滑</li>
<li>2014年 &nbsp;友邦吊顶 &nbsp;20亿 &nbsp; &nbsp;当年利润 1.05亿 建仓估值 &nbsp;19.05倍</li>
<li>2014年 &nbsp;川大智胜 &nbsp;29亿 &nbsp; &nbsp;当年利润 0.11亿 上年利润 0.68亿 &nbsp;按照动态pe在32倍 &nbsp;大合同出现意外业绩 大幅低于预期买入的时候预期应该是利润在0.9亿</li>
<li>2015年 &nbsp;宜昌交运 &nbsp;27亿 &nbsp; 2014年净利润0.635亿 &nbsp;静态pe42.5倍 &nbsp; 如果今年的利润增长能达到30%，那么动态估值32倍左右 &nbsp; 实际上今年利润会有多少存在疑问，公司目标是利润5000万元。第一季度净利润同比下降。这只股票的估值相对前面几个来说要高一些。但是建仓时候的指数点位很不同。宜昌交运在5000点的位置属于是相对低估值，滞胀股，属于市场看好的旅游行业，同时有国企改革的利好。</li>
</ul>
<p style="padding-left: 40px;">3、专注电子行业，医疗医药行业，消费行业。尤其是电子行业的股票风生水起买的很多。</p>
<p style="padding-left: 40px;">4、重仓股都是长线投资。</p>
<p style="padding-left: 40px;">5、定性投资，注重公司的质地选择。所选公司是大行业的小公司，但是在行业内的排名又是数一数二的。</p>
<p style="padding-left: 40px;">6、集中投资。看好的股票第一重仓一般都在5成仓位以上。不管资金有多大，所持有的股票大概都在3到5只。</p>
<p style="padding-left: 40px;">7、几乎时时刻刻都是重仓或者全仓，重仓或者全仓穿越牛熊。</p>
<p>&nbsp; &nbsp; 在总结时我注意到， 好多他的股票比如大华股份，奥拓电子等在刚开始买入的一两年业绩都一般，增速较低，业绩爆发往往是一两年以后，比较考验投资人的耐心和对公司的信心。所以买入时候的低估值是非常重要的。这样依靠估值的提升也可以快速脱离成本区获利，增强持股信心。</p>',
            'summary' => '风生水起的投资要点：选股首选市值。风生水起坚持投资迷你的小市值股票。坚持建仓的时候必须是一般来说动态pe绝对的低估值，动态pe都30倍左右或者低于30倍。专注电子行业，医疗医药行业，消费行业。重仓股都是长线投资。定性投资，注重公司的质地选择。所选公司是大行业的小公司，但是在行业内的排名又是数一数二的。集中投资。看好的股票第一重仓一般都在5成仓位以上。不管资金有多大，所持有的股票大概都在3到5只。几乎时时刻刻都是重仓或者全仓，重仓或者全仓穿越牛熊。',
            'category_id' => 17,
        ]);
        ArticleLabel::insert([
            ['article_id' => $article->id, 'label_id' => 6],
            ['article_id' => $article->id, 'label_id' => 7],
        ]);
        ArticleKeyword::insert([
            ['article_id' => $article->id, 'keyword' => '风生水起'],
            ['article_id' => $article->id, 'keyword' => '股票投资'],
            ['article_id' => $article->id, 'keyword' => '成长股投资'],
            ['article_id' => $article->id, 'keyword' => '长线投资经历'],
        ]);

        $article = Article::create([
            'title' => '风生水起的投资经历',
            'content' => '<h4>一、投资业绩</h4>
<ul>
<li>2004年 &nbsp;账户收益率为-2.7%， &nbsp;同期上证指数涨幅为-15.4%</li>
<li>2005年 &nbsp;账户收益率为83.1%， &nbsp;同期上证指数涨幅为-8.29%</li>
<li>2006年 &nbsp;账户收益率为107%， &nbsp; 同期上证指数涨幅为130%</li>
<li>2007年 &nbsp;账户收益率为110%， &nbsp; 同期上证指数涨幅为96.7%</li>
<li>2008年 &nbsp;账户收益率为-15.5%， 同期上证指数涨幅为-65.4%</li>
<li>2009年 &nbsp;账户收益率为170.6%， &nbsp;同期上证指数涨幅为79.98%</li>
<li>2010年 &nbsp;账户收益率为128.7%， &nbsp;同期上证指数涨幅为-14.3%</li>
<li>2011年 &nbsp;账户收益率为-16.85%，同期上证指数涨幅为-21.68%</li>
<li>2012年 &nbsp;账户收益率为 39.92%， &nbsp;同期上证指数涨幅为3.18%</li>
<li>2013年 &nbsp;账户收益率为 247.2%， &nbsp;同期上证指数涨幅为-6.7%</li>
</ul>
<p>&nbsp; &nbsp; 过去10年的年均复合增长率为66.49%，10年的投资总回报为163倍。</p>
<p>&nbsp; &nbsp; 如果按04年年初10万元本金计算，到2009年底应该是130.8万，6年时间财富增长了12倍。</p>
<h4>二、投资经历</h4>
<p>&nbsp; &nbsp; 1997年5月22日，也就是600062双鹤药业上市的那一天，他正式成为A股股民。当天揣着2000元在上海四平路的沈建信托完成了第一笔交易，买入100股600701工大高新，买入的理由是听股评说这个股会翻倍。</p>
<p>&nbsp; &nbsp; 04年转型价值投资。</p>
<p>&nbsp; &nbsp; 高考文科第一，就读经济学院国际贸易专业，大学四年毕业。</p>
<p>&nbsp; &nbsp; 到了1998年，他参加了工作（估计2014年38岁）。</p>
<p>&nbsp; &nbsp; 2001年的8月份，他正式辞去了当时令人羡慕的工作，一边尝试着独立开拓业务，一边在低迷的股市里摸爬滚打。</p>
<p>&nbsp; &nbsp; 在他的生活中，有着三大爱好：音乐、股票和旅游。</p>
<p>&nbsp; &nbsp; 与其说他对股票有兴趣，还不如说他喜欢研究企业更确切一些。</p>
<p>&nbsp; &nbsp; 每年的4月和9-10月，都是他外出旅游的季节。</p>
<p>&nbsp; &nbsp; 他的老家在湖北荆州，现定居青岛。2011年在成都购房，有了第二故乡。</p>',
            'summary' => '风生水起的投资业绩，过去10年的年均复合增长率为66.49%，10年的投资总回报为163倍。如果按04年年初10万元本金计算，到2009年底应该是130.8万，6年时间财富增长了12倍。2001年的8月份，他正式辞去了当时令人羡慕的工作，一边尝试着独立开拓业务，一边在低迷的股市里摸爬滚打。在他的生活中，有着三大爱好：音乐、股票和旅游。',
            'category_id' => 17,
        ]);
        ArticleLabel::insert([
            ['article_id' => $article->id, 'label_id' => 6],
            ['article_id' => $article->id, 'label_id' => 4],
        ]);
        ArticleKeyword::insert([
            ['article_id' => $article->id, 'keyword' => '风生水起'],
            ['article_id' => $article->id, 'keyword' => '股票投资'],
            ['article_id' => $article->id, 'keyword' => '成长股投资'],
            ['article_id' => $article->id, 'keyword' => '长线投资经历'],
        ]);
    }
}
