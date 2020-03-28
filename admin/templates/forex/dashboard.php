<div class="row">
	<div class="col-sm-10">
		<!-- TradingView Widget BEGIN -->
		<div class="tradingview-widget-container">
		  <div id="tradingview_1cefa2"></div>
		  
		  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
		  <script type="text/javascript">
		  new TradingView.widget(
		  {
		  
		  "width" : "100%",
		  "hight" : 1000,
		  "symbol": "OANDA:EURUSD",
		  "interval": "240",
		  "timezone": "Asia/Bangkok",
		  "theme": "light",
		  "style": "1",
		  "locale": "vi_VN",
		  "toolbar_bg": "#f1f3f6",
		  "hide_legend": false,
		  "enable_publishing": true,
		  "hide_side_toolbar": false,
		  "allow_symbol_change": true,
		  "watchlist": [
		    "OANDA:EURUSD",
		    "OANDA:USDJPY",
		    "OANDA:GBPUSD",
		    "OANDA:GBPJPY",
		    "COINBASE:BTCUSD"
		  ],
		  "calendar": true,
		  "container_id": "tradingview_1cefa2"
		}
		  );
		  </script>
		</div>
		<!-- TradingView Widget END -->
	</div>

	<div class="col-sm-2">
		<form>
		  <div class="form-group">
		    <label>Open Price</label>
		    <input type="text" class="form-control">
		    
		  </div>
		  

		  <div class="form-group">
		    <label>Stoploss</label>
		    <input type="text" class="form-control">
		    
		  </div>


		  <div class="form-group">
		    <label>Take Profit</label>
		    <input type="text" class="form-control">
		    
		  </div>

		  <div class="form-group">
		    <label>Image URL</label>
		    <input type="text" class="form-control">
		    
		  </div>

		  <button type="button" class="btn btn-primary btnTelegram">Telegram</button>

		  <button type="button" class="btn btn-primary">Apps</button>
		</form>
	</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		$(".btnTelegram").on("click", function(){
			var message = "Text MSG";
			var settings = {
			  "async": true,
			  "crossDomain": true,
			  "url": "https://api.telegram.org/922775317:AAFMog8g_hh28jJMahw-BVHz4OtZBOd_rqs/sendMessage",
			  "method": "POST",
			  "headers": {
			    "Content-Type": "application/json",
			    "cache-control": "no-cache"
			  },
			  "data": JSON.stringify({
			    "chat_id": "@smartiqtrader",
			    "text": message
			  })
			}

			$.ajax(settings).done(function (response) {
			  console.log(response);
			}); 
		});
	});
	

</script>