<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('login')}}">POS</a> 
    </div>
    <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> 
        Last access : <span id="date">30 May 2014</span> &nbsp; <a href="{{route('logout')}}" class="btn btn-danger square-btn-adjust">Logout</a> 
    </div>
</nav> 
<script type="text/javascript">
    getLastLogin();
    async function getLastLogin() {
        let url="/get-last-login";
        let result = await axios.get(url);
        if(result.status == 200){
            getInput("date").innerHTML=result.data;
        }
    }
</script>