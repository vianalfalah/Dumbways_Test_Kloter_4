{

                            Online Pascal Compiler.
                Code, Compile, Run and Debug Pascal program online.
Write your code in this editor and press "Run" button to execute it.

}

program No1;
var 
    A : array [1..100,1..100] of string;
    i,j,n : integer;
begin

write('Masukkan Nilai :'); readln(n);
  for i := 1 to n do
  begin
    for j := 1 to n do
    if (j>1) and (j<n) then
    begin
    A[i,j]:='=';
    end
   
    else
    begin
    A[i,j]:='*';
    end;
    end;
    for i:=1 to n do
    begin
        for j:= 1 to n do
        write(A[i,j]:2,' ');
        writeln;
    end;
    readln;
end.
