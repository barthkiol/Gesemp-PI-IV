package Classes;

import javax.persistence.*;

@Entity
public class Categoria {
	
	@Id
	@GeneratedValue (strategy=GenerationType.IDENTITY)
	private long id;
	
	private String nome;
	
	@ManyToOne
	private Categoria categoria;
	

	public Categoria() {
		
	}

	public Categoria(long id, String nome, Categoria categoria) {
		this.id = id;
		this.nome = nome;
		this.categoria = categoria;
	}

	public long getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public Categoria getCategoria() {
		return categoria;
	}

	public void setCategoria(Categoria categoria) {
		this.categoria = categoria;
	}

	@Override
	public String toString() {
		return "Categoria [id=" + id + ", nome=" + nome + ", categoria=" + categoria + "]";
	}
	
	
}
