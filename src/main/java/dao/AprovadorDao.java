package dao;

import java.sql.*;
import java.util.*;

import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.Query;

import Classes.Aprovador;



public class AprovadorDao {

	private Connection con = null; 
	
	public String salvar(Aprovador aprovador) throws Exception {
		//String retorno;
		try {
			EntityManager em = Conexao.getEntityManager();			
			em.getTransaction().begin();
			em.persist(aprovador);
			em.getTransaction().commit();			
			return "Ok";
		} catch(Exception e) {
			throw new Exception("Erro gravando Aprovador: "+e.getMessage());
		} 
					
	}
	// alterar
		public String alterar(Aprovador aprovador) throws Exception {
			try {			
				EntityManager em = Conexao.getEntityManager();			
				em.getTransaction().begin();
				em.merge(aprovador);
				em.getTransaction().commit();			
				return "Ok";			
			} catch(Exception e) {
				throw new Exception("Erro gravando Aprovador: "+e.getMessage());
			}		
		}
		
		// excluir
		public String deletar(Aprovador aprovador) throws Exception {
			try {
				EntityManager em = Conexao.getEntityManager();
				Aprovador c = em.find(Aprovador.class, aprovador.getId());
				em.getTransaction().begin();
				em.remove(c);
				em.getTransaction().commit();			
				return "Ok";
			}catch(Exception e) {
				throw new Exception("Erro gravando  Aprovador: " + e.getMessage());
			}		
		}	
		
		// consultar
		public List<Aprovador> consultar() throws Exception{
			// criar uma var para lista
			EntityManager em = Conexao.getEntityManager();
			Query q = em.createQuery("from Aprovador");
			return q.getResultList();				
		}
		
		public Aprovador getAprovador(Integer id) {

			 EntityManager em = Conexao.getEntityManager();
		      try {
		    	  Aprovador aprovador = (Aprovador) em.createQuery("SELECT c from Aprovador c where c.id = :id").setParameter("id", id).getSingleResult();
		      

		        return aprovador;
		      } catch (NoResultException e) {
		            return null;
		      }
		    }
}
