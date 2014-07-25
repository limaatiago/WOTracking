<?php

if ( $os_info->status_os == 2 ) {
?>

<div id="blocos-conteudo">
	<table id="bloco-status" style="border-bottom: 20px solid #efc415; margin-right: 3%;">
		<thead>
			<th style="background-color: #efc415;">Orçamento Aprovado?</th>
		</thead>
		<form method="post">
		<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>" />
		<tbody>
			<tr>
				<td id="primeiro-botao">
				<input type="submit" name="autorizacao_sim" class="button" value="Sim"/>
				</td>
			</tr>
			<tr>
				<td id="meio-botao">
				<input type="submit" name="autorizacao_agu" class="button" value="Aguardando" />
				</td>
			</tr>
			<tr>
				<td id="ultimo-botao">
				<input type="submit" name="autorizacao_nao" class="button" value="Não" />
				</td>
			</tr>
		</tbody>
		</form>
	</table>
	<table id="bloco-status" class="quadro-esconder" style="border-bottom: 20px solid #d6d5d1; margin-right: 3%;">
		<thead>
			<th style="background-color: #d6d5d1;">Serviço Executado?</th>
		</thead>
		<tbody>
			<tr>
				<td id="primeiro-botao">
				<input type="submit" name="executado_sim" class="button" value="Sim" disabled />
				</td>
			</tr>
			<tr>
				<td id="meio-botao">
				<input type="submit" name="executado_agu" class="button" value="Aguardando" disabled />
				</td>
			</tr>
			<tr>
				<td id="ultimo-botao">
				<input type="submit" name="executado_nao" class="button" value="Não" disabled />
				</td>
			</tr>
		</tbody>
	</table>
	<table id="bloco-status" class="quadro-esconder" style="border-bottom: 20px solid #d6d5d1;">
		<thead>
			<th style="background-color: #d6d5d1;">Produto Entregue?</th>
		</thead>
		<tbody>
			<tr>
				<td id="primeiro-botao">
				<input type="submit" name="entregue_sim" class="button" value="Sim" disabled />
				</td>
			</tr>
			<tr>
				<td id="ultimo-botao">
				<input type="submit" name="entregue_agu" class="button" value="Aguardando" disabled />
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php } 

elseif ( $os_info->status_os == 3 ) {
?>

<div id="blocos-conteudo">
	<table id="bloco-status" class="quadro-esconder" style="border-bottom: 20px solid #d6d5d1; margin-right: 3%;">
		<thead>
			<th style="background-color: #d6d5d1;">Orçamento Aprovado?</th>
		</thead>
		<tbody>
			<tr>
				<td id="um-botao">
				<input type="submit" class="button" value="Sim" disabled />
				</td>
			</tr>
		</tbody>
	</table>
	<table id="bloco-status" style="border-bottom: 20px solid #eb5c4c; margin-right: 3%;">
		<thead>
			<th style="background-color: #eb5c4c;">Serviço Executado?</th>
		</thead>
		<form method="post">
		<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>" />
		<tbody>
			<tr>
				<td id="primeiro-botao">
				<input type="submit" name="executado_sim" class="button" value="Sim"/>
				</td>
			</tr>
			<tr>
				<td id="meio-botao">
				<input type="submit" name="executado_agu" class="button" value="Aguardando" />
				</td>
			</tr>
			<tr>
				<td id="ultimo-botao">
				<input type="submit" name="executado_nao" class="button" value="Não" />
				</td>
			</tr>
		</tbody>
		</form>
	</table>
	<table id="bloco-status" class="quadro-esconder" style="border-bottom: 20px solid #d6d5d1;">
		<thead>
			<th style="background-color: #d6d5d1;">Produto Entregue?</th>
		</thead>
		<tbody>
			<tr>
				<td id="primeiro-botao">
				<input type="submit" class="button" value="Sim" disabled />
				</td>
			</tr>
			<tr>
				<td id="ultimo-botao">
				<input type="submit" class="button" value="Aguardando" disabled />
				</td>
			</tr>
		</tbody>
	</table>
</div>

<?php }

elseif ( $os_info->status_os == 4 ) {
?>

<div id="blocos-conteudo">
	<table id="bloco-status" style="border-bottom: 20px solid #efc415; margin-right: 3%;">
		<thead>
			<th style="background-color: #efc415;">Orçamento Reprovado</th>
		</thead>
		<form method="post">
		<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>" />
		<tbody>
			<tr>
				<td id="um-botao">
				<input type="submit" name="autorizacao_sim"  class="button" value="Aprovar" />
				</td>
			</tr>
		</tbody>
		</form>
	</table>
	<table id="bloco-status" class="quadro-esconder" style="border-bottom: 20px solid #d6d5d1; margin-right: 3%;">
		<thead>
			<th style="background-color: #d6d5d1;">Serviço Executado?</th>
		</thead>
		<form method="post">
		<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>" />
		<tbody>
			<tr>
				<td id="um-botao">
				<input type="submit" name="executado_nao" class="button" value="Não" disabled />
				</td>
			</tr>
		</tbody>
		</form>
	</table>
	<table id="bloco-status" style="border-bottom: 20px solid #0dbc9d;">
		<thead>
			<th style="background-color: #0dbc9d;">Produto Entregue?</th>
		</thead>
		<form method="post">
		<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>" />
		<tbody>
			<tr>
				<td id="primeiro-botao">
				<input type="submit" name="entregue_rep_sim" class="button" value="Sim" />
				</td>
			</tr>
			<tr>
				<td id="ultimo-botao">
				<input type="submit" name="entregue_agu"class="button" value="Aguardando" />
				</td>
			</tr>
		</tbody>
		</form>
	</table>
</div>

<?php }

elseif ( $os_info->status_os == 5 ) {
?>

<div id="blocos-conteudo">
	<table id="bloco-status" class="quadro-esconder" style="border-bottom: 20px solid #d6d5d1; margin-right: 3%;">
		<thead>
			<th style="background-color: #d6d5d1;">Orçamento Aprovado?</th>
		</thead>
		<tbody>
			<tr>
				<td id="um-botao">
				<input type="submit" class="button" value="Sim" disabled />
				</td>
			</tr>
		</tbody>
	</table>
	<table id="bloco-status" class="quadro-esconder" style="border-bottom: 20px solid #d6d5d1; margin-right: 3%;">
		<thead>
			<th style="background-color: #d6d5d1;">Serviço Executado?</th>
		</thead>
		<tbody>
			<tr>
				<td id="um-botao">
				<input type="submit" class="button" value="Sim" disabled />
				</td>
			</tr>
		</tbody>
	</table>
	<table id="bloco-status" style="border-bottom: 20px solid #0dbc9d;">
		<thead>
			<th style="background-color: #0dbc9d;">Produto Entregue?</th>
		</thead>
		<form method="post">
		<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>" />
		<tbody>
			<tr>
				<td id="primeiro-botao">
				<input type="submit" name="entregue_sim" class="button" value="Sim"/>
				</td>
			</tr>
			<tr>
				<td id="ultimo-botao">
				<input type="submit" name="entregue_agu" class="button" value="Aguardando" />
				</td>
			</tr>
		</tbody>
		</form>
	</table>
</div>

<?php }

elseif ( $os_info->status_os == 6 ) {
?>

<div id="blocos-conteudo">
	<table id="bloco-status" class="quadro-esconder" style="border-bottom: 20px solid #d6d5d1; margin-right: 3%;">
		<thead>
			<th style="background-color: #d6d5d1;">Orçamento Aprovado?</th>
		</thead>
		<tbody>
			<tr>
				<td id="um-botao">
				<input type="submit" class="button" value="Sim" disabled />
				</td>
			</tr>
		</tbody>
	</table>
	<table id="bloco-status" class="quadro-esconder" style="border-bottom: 20px solid #d6d5d1; margin-right: 3%;">
		<thead>
			<th style="background-color: #d6d5d1;">Serviço Executado?</th>
		</thead>
		<tbody>
			<tr>
				<td id="um-botao">
				<input type="submit" class="button" value="Não" disabled />
				</td>
			</tr>
		</tbody>
	</table>
	<table id="bloco-status" style="border-bottom: 20px solid #0dbc9d;">
		<thead>
			<th style="background-color: #0dbc9d;">Produto Entregue?</th>
		</thead>
		<form method="post">
		<input type="hidden" name="numeroOs" value="<?php echo $num_os ?>" />
		<tbody>
			<tr>
				<td id="primeiro-botao">
				<input type="submit" name="entregue_rep_sim" class="button" value="Sim"/>
				</td>
			</tr>
			<tr>
				<td id="ultimo-botao">
				<input type="submit" name="entregue_agu" class="button" value="Aguardando" />
				</td>
			</tr>
		</tbody>
		</form>
	</table>
</div>

<?php }

else {
?>
<div id="blocos-conteudo">
	<table id="bloco-status" class="quadro-esconder" style="margin-right: 3%;">
		<thead>
			<th style="background-color: #efc415;">Orçamento Aprovado!</th>
		</thead>
	</table>
	<table id="bloco-status" class="quadro-esconder" style="margin-right: 3%;">
		<thead>
			<th style="background-color: #eb5c4c;">Serviço Executado!</th>
		</thead>
	</table>
	<table id="bloco-status">
		<thead>
			<th style="background-color: #0dbc9d;">Produto Entregue!</th>
		</thead>
	</table>
</div>

<?php
}

 ?>