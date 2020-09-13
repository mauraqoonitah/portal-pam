function number_format(num) { 			
			var ribuan = 11/2;
				ribuan = ribuan.toString();
				if (ribuan.indexOf(',') >= 0) {
					tandaribuan = ',';
					tandadesimal= '.';
				} else {
					tandaribuan = '.';
					tandadesimal= ',';
				}		
			
			var fnum = '';
			
			angkanya = num.toString();
			for (i=0; i<angkanya.length; i++) {
				
				if ((angkanya.length-i)%3==0 && fnum.length>0) {
					fnum += tandaribuan;
				}
				fnum += angkanya.charAt(i);
			}
			var rnum = fnum;
			
			return rnum;
		}
		
	function clean(num){
			var angka = num.toString();
			var v = angka;
			v=v.replace(/\./g,'');
			v=v.replace(/\,/g,'');
			return v;
	}