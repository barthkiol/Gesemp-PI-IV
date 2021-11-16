package Classes;

import javax.persistence.*;

@Entity
public class Fornecedor {

	
	@Id
	@GeneratedValue (strategy=GenerationType.IDENTITY)
	private long id;
	
	private String nome;
	private String endereco;
	private String telefone;
	private String email;
	
	
	public Fornecedor() {
		
	}


	public Fornecedor(long id, String nome, String endereco, String telefone, String email) {
		this.id = id;
		this.nome = nome;
		this.endereco = endereco;
		this.telefone = telefone;
		this.email = email;
	}


	public long getId() {
		return id;
	}


	public void setId(long id) {
		this.id = id;
	}


	public String getNome() {
		return nome;
	}


	public void setNome(String nome) {
		this.nome = nome;
	}


	public String getEndereco() {
		return endereco;
	}


	public void setEndereco(String endereco) {
		this.endereco = endereco;
	}


	public String getTelefone() {
		return telefone;
	}


	public void setTelefone(String telefone) {
		this.telefone = telefone;
	}


	public String getEmail() {
		return email;
	}


	public void setEmail(String email) {
		this.email = email;
	}


	@Override
	public String toString() {
		return "Fornecedor [id=" + id + ", nome=" + nome + ", endereco=" + endereco + ", telefone=" + telefone
				+ ", email=" + email + "]";
	}
	
	
	
	
}