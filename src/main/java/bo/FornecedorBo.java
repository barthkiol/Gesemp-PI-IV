package bo;

import java.util.List;

import Classes.*;
import dao.*;

public class FornecedorBo {

	
	public String salvar(Fornecedor fornecedor) throws Exception {
		validarDadosGrupo(fornecedor);

		// Chamar a DAo para inserir o fornecedor no BD
		FornecedorDao dao = new FornecedorDao();
		try {
			return dao.salvar(fornecedor);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}
	}
	
	public String alterar(Fornecedor fornecedor) throws Exception {
		validarDadosGrupo(fornecedor);

		// Chamar a DAo para alterar o fornecedor no BD
		FornecedorDao dao = new FornecedorDao();
		try {
			return dao.alterar(fornecedor);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}		
	}
	
	public String deletar(Fornecedor fornecedor) throws Exception {
		
		// Chamar a DAo para deletar o fornecedor no BD
		FornecedorDao dao = new FornecedorDao();
		try {
			return dao.deletar(fornecedor);
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}		
	}	
	
	public List<Fornecedor> consultar() throws Exception{	
		
		FornecedorDao dao = new FornecedorDao();
		try {
			return dao.consultar();
		} catch (Exception e) {
			throw new Exception(e.getMessage());
		}			
	}	

	private void validarDadosGrupo(Fornecedor fornecedor) throws Exception {
		// Valida��o da regra de neg�cio
		if (fornecedor.getNome().equals("")) {
			throw new Exception("Nome n�o pode ficar em branco!");
		}
		if (fornecedor.getEmail().equals("")) {
			throw new Exception("Email n�o pode ficar em branco!");
		}
		if (fornecedor.getEndereco().equals("")) {
			throw new Exception("Endereço n�o pode ficar em branco!");
		}
		if (fornecedor.getTelefone().equals("")) {
			throw new Exception("Telefone n�o pode ficar em branco!");
		}
		
	}
}
