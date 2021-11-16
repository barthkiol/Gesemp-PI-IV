package Classes;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.ManyToOne;

@Entity
public class Pedido {
	

	@Id
	@GeneratedValue (strategy=GenerationType.IDENTITY)
	private long id;
	
	private String numPedido;
	private String data;
	private Status status;
	private String tipoDePagamento;
	private double total;
	private String tipoDeEntrega;
	private int parcelas;
	private String codigoDeRastreio;

	@ManyToOne
	private Comprador comprador;
	
	@ManyToOne
	private Aprovador aprovador;
	
//	@ManyToMany
//	@JoinTable(name = "TB_PEDIDO_PRODUTO",  // nome da tabela relacional no BD		
//			// lado dominante/lado forte
//			joinColumns = {
//					@JoinColumn(name = "pedido_id")
//					
//			},
//			//lado dominado/lado fraco
//			inverseJoinColumns = {
//					@JoinColumn(name = "produto_id")
//			}	
//		)
//	private List<Produto> produtos;
//	public List<Produto> getProduto() {
//		return produtos;
//	}
//	
//	public void adicionaProduto(Produto p) {
//		produtos.add(p);
//	}
//	public void removeProduto(Produto p) {
//		produtos.remove(p);
//	}
//	public Produto getProduto(int posicao) {
//		return produtos.get(posicao);
//	}
	
	
	private String nfSerial;
	private String nfNumber;
	private String nfKey;
	

	public Pedido() {
		//produtos = new ArrayList<Produto>();
	}

	public Pedido(long id, String numPedido, String data, Status status, String tipoDePagamento, double total,
			String tipoDeEntrega, int parcelas, String codigoDeRastreio, Comprador comprador, String nfSerial,
			String nfNumber, String nfKey, Aprovador aprovador) {
		this.id = id;
		this.numPedido = numPedido;
		this.data = data;
		this.status = status;
		this.tipoDePagamento = tipoDePagamento;
		this.total = total;
		this.tipoDeEntrega = tipoDeEntrega;
		this.parcelas = parcelas;
		this.codigoDeRastreio = codigoDeRastreio;
		this.comprador = comprador;
		this.nfSerial = nfSerial;
		this.nfNumber = nfNumber;
		this.nfKey = nfKey;
		this.aprovador = aprovador;
		//produtos = new ArrayList<Produto>();
	}

	public long getId() {
		return id;
	}

	public void setId(long id) {
		this.id = id;
	}

	public String getNumPedido() {
		return numPedido;
	}

	public void setNumPedido(String numPedido) {
		this.numPedido = numPedido;
	}

	public String getData() {
		return data;
	}

	public void setData(String data) {
		this.data = data;
	}

	public Status getStatus() {
		return status;
	}

	public void setStatus(Status status) {
		this.status = status;
	}

	public String getTipoDePagamento() {
		return tipoDePagamento;
	}

	public void setTipoDePagamento(String tipoDePagamento) {
		this.tipoDePagamento = tipoDePagamento;
	}

	public double getTotal() {
		return total;
	}

	public void setTotal(double total) {
		this.total = total;
	}

	public String getTipoDeEntrega() {
		return tipoDeEntrega;
	}

	public void setTipoDeEntrega(String tipoDeEntrega) {
		this.tipoDeEntrega = tipoDeEntrega;
	}

	public int getParcelas() {
		return parcelas;
	}

	public void setParcelas(int parcelas) {
		this.parcelas = parcelas;
	}

	public String getCodigoDeRastreio() {
		return codigoDeRastreio;
	}

	public void setCodigoDeRastreio(String codigoDeRastreio) {
		this.codigoDeRastreio = codigoDeRastreio;
	}

	public Comprador getComprador() {
		return comprador;
	}

	public void setComprador(Comprador comprador) {
		this.comprador = comprador;
	}

	public String getNfSerial() {
		return nfSerial;
	}

	public void setNfSerial(String nfSerial) {
		this.nfSerial = nfSerial;
	}

	public String getNfNumber() {
		return nfNumber;
	}

	public void setNfNumber(String nfNumber) {
		this.nfNumber = nfNumber;
	}

	public String getNfKey() {
		return nfKey;
	}

	public void setNfKey(String nfKey) {
		this.nfKey = nfKey;
	}
	

	public Aprovador getAprovador() {
		return aprovador;
	}

	public void setAprovador(Aprovador aprovador) {
		this.aprovador = aprovador;
	}

	@Override
	public String toString() {
		return "Pedido [id=" + id + ", numPedido=" + numPedido + ", data=" + data + ", status=" + status
				+ ", tipoDePagamento=" + tipoDePagamento + ", total=" + total + ", tipoDeEntrega=" + tipoDeEntrega
				+ ", parcelas=" + parcelas + ", codigoDeRastreio=" + codigoDeRastreio + ", comprador=" + comprador
				+ ", aprovador=" + aprovador + ", nfSerial=" + nfSerial + ", nfNumber=" + nfNumber + ", nfKey=" + nfKey
				+ "]";
	}

	
	
	
	
	
}
