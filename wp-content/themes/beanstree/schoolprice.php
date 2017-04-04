<?php
/****************************************

	Template Name: schoolprice

	固定ページを表示するための
	テンプレートファイルです。

	まめの木ついてのリンク先

*****************************************/

get_header(); ?>
<section class="l-box">
	<div class="HeadSpace"></div>
	<div class="SectionLabel">
        <h3 class="SectionLabel__text">
        	<img class="SectionLabel__image" src=<?php echo get_template_directory_uri().'/images/icon_mame.png' ?> alt="">
        	<span class="SectionLabel__color">まめの木</span>の料金
        </h3>
    </div>
<div class="Price">
    <div class="Price__sub">
    	<h4>参加料金</h4>
    </div>
    <div class="Price__main">
    	<div class="Price__head">
    		<p>対象のお子さんは3歳以上です。週に5日のフルタイム制の月額と1日単位でのパートタイム制の日額があります。ご兄弟お2人目からは減額いたします。</p>
    	</div>
    	<div class="Price__body--1">
    		<table>
    			<tr class="color1">
    				<th>
    					料金表
    				</th>
    				<th>
    					1人目
    				</th>
    				<th>
    					2人目
    				</th>
    			</tr>
    			<tr class="color2">
    				<td>
    					月額
    				</td>
    				<td>
    					¥30,000
    				</td>
    				<td>
    					¥10,000
    				</td>
    			</tr>
    			<tr class="color2">
    				<td>
    					日額
    				</td>
    				<td>
    					¥2,000
    				</td>
    				<td>
    					¥1,000
    				</td>
    			</tr>
    		</table>
    	</div>
    	<div class="Price__foot">
    		<ul>
    			<li>
    				※3歳のお子さんには、保護者の同伴が必要です。
    			</li>
    			<li>
    				※未就学児は保護者が交代で見守り自主保育をしています。
    			</li>
    		</ul>
    	</div>
    </div>
    <div class="Price__sub">
    	<h4>減額制度</h4>
    </div>
    <div class="Price__main">
    	<div class="Price__head">
    		<p>保護者の方にスタッフとして活動に参加していただけると月の合計金額から以下の金額を減額いたします。</p>
    	</div>
    	<div class="Price__body">
    		<p>1日の参加で¥4,000　半日の参加で¥2,000</p>
    	</div>
    	<div class="Price__foot">
    		<ul>
    			<li>
    				※スタッフとして参加していただくには消防署で受けられる救急救命の講座を受講していただく必要があります。
    			</li>
    			<li>
    				※減額の上限は...
    			</li>
    		</ul>
    	</div>
    </div>
    <div class="Price__sub">
    	<h4>その他の費用</h4>
    </div>
    <div class="Price__main">
    	<div class="Price__body">
    		<p>年間保険料：¥2,000<br>調理実習費(火・木)：子供¥200  大人¥250</p>
    	</div>
    	<div class="Price__foot">
    		<ul>
    			<li>
    				※調理実習費はご希望の方のみ
    			</li>
    		</ul>
    	</div>
    </div>
    <div class="Price__sub">
    	<h4>お支払い方法</h4>
    </div>
    <div class="Price__main">
    	<div class="Price__head">
    		<p>月末に集計し翌月に請求させていただきます。銀行振込または現金にてお支払いください。</p>
    	</div>
    </div>
</div>
</section>
<?php get_footer(); ?>