{

                            Online Pascal Compiler.
                Code, Compile, Run and Debug Pascal program online.
Write your code in this editor and press "Run" button to execute it.

}


program No2;
uses crt;

procedure balik;
type
  point = ^recPoint;
  recPoint = record
            isi : string;
            lanjut : point;
  end;
  var
    nilai, nilaiawal : point;
    n , i : integer;

    begin
      clrscr;
      nilaiawal  := nil;
      write('Banyaknya Nilai :'); readln(n);
      for i:= 1 to n do
      begin
      new(nilai);
      write ('Masukan Nilai Ke - ',i,' = '); readln(nilai^.isi);

      nilai^.lanjut := nilaiawal;
      nilaiawal := nilai;

      end;
      
      writeln('Output Pembalikan');
      writeln('--------------------');
      nilai := nilaiawal;
      while nilai <> nil do begin
      write(nilai^.isi,',');
      
      nilai := nilai^.lanjut;
      end;

readln;
end;


begin
  clrscr;
    balik;
  end.


