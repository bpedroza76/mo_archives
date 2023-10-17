<script language="javascript">

<!--Start weather animation functions-->

function initialize()
{
start=false
imageSource=new Array(24)
for (var i=0; i<24; i++)
     {
     if ( i<10 ) 
        { 
        index="0"+i
	}
     else
        {
        index=i
	}
     imageSource[i]=new Image()
     imageSource[i].src="07_webservices/02_weather/frame"+index+".jpg"
     }
delay=500
delta=100
nextImage=1
startAnimation()
}

function startAnimation()
{
interval=setInterval('animate()',delay)
}

function setStart()
{
start=true
}

function animate()
{
if (start==true)
     {
     i=nextImage
     ++nextImage
     nextImage%=24
     if (imageSource[i].complete)
        document.display.src=imageSource[i].src
     }
}

<!--End weather animation functions-->

</script>
